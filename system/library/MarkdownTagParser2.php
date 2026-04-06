<?php

namespace joe\library;

class MarkdownTagParser
{
	private $content;
	private $length;
	private $offset = 0;

	/**
	 * 解析内容并返回节点数组
	 * @param string $content 包含 {} 标签的内容
	 * @return array 解析后的节点数组
	 */
	public function parse($content)
	{
		$this->content = $content;
		$this->length = strlen($content);
		$this->offset = 0;
		return $this->parseNodes();
	}

	/**
	 * 将解析后的节点渲染为 HTML
	 * @param array $nodes parse() 方法返回的节点数组
	 * @param array $callbacks 标签渲染回调函数数组 ['tagName' => function($attrs, $childrenHtml) { ... }]
	 * @return string 渲染后的 HTML 字符串
	 */
	public function render($nodes, $callbacks = [])
	{
		$html = '';
		foreach ($nodes as $node) {
			if ($node['type'] === 'text') {
				// $html .= htmlspecialchars($node['content'], ENT_QUOTES, 'UTF-8');
				$html .= $node['content'];
			} elseif ($node['type'] === 'tag') {
				$tagName = $node['tag'];
				if (isset($callbacks[$tagName])) {
					$childrenHtml = $this->render($node['children'], $callbacks);
					$html .= $callbacks[$tagName]($node['attributes'], $childrenHtml);
				} else {
					// 未定义回调的标签，原样输出
					$html .= $this->restoreTag($node);
				}
			}
		}
		return $html;
	}

	// private function parseNodes()
	// {
	// 	$nodes = [];
	// 	while ($this->offset < $this->length) {
	// 		$nextBrace = strpos($this->content, '{', $this->offset);
	// 		if ($nextBrace === false) {
	// 			$this->addTextNode($nodes, substr($this->content, $this->offset));
	// 			$this->offset = $this->length;
	// 			break;
	// 		}
	// 		$this->addTextNode($nodes, substr($this->content, $this->offset, $nextBrace - $this->offset));
	// 		$this->offset = $nextBrace + 1;
	// 		$node = $this->parseTag();
	// 		if ($node) $nodes[] = $node;
	// 	}
	// 	return $nodes;
	// }

	// --- 内部解析方法 ---
	private function parseNodes()
	{
		$nodes = [];
		while ($this->offset < $this->length) {
			// 1. 查找 <pre 标签开头 (不区分大小写)
			$nextPreStart = stripos($this->content, '<pre', $this->offset);
			// 2. 查找自定义标签开始标记 {
			$nextBrace = strpos($this->content, '{', $this->offset);

			// 情况 A：没有特殊标记
			if ($nextPreStart === false && $nextBrace === false) {
				$this->addTextNode($nodes, substr($this->content, $this->offset));
				$this->offset = $this->length;
				break;
			}

			// 情况 B：先遇到了 <pre
			if ($nextPreStart !== false && ($nextBrace === false || $nextPreStart < $nextBrace)) {
				// 添加 pre 之前的文本
				$this->addTextNode($nodes, substr($this->content, $this->offset, $nextPreStart - $this->offset));
				$this->offset = $nextPreStart;

				// 寻找对应的 </pre> 结束标签 (不区分大小写)
				$nextPreEnd = stripos($this->content, '</pre>', $this->offset);
				if ($nextPreEnd !== false) {
					// 把 <pre ...> 到 </pre> 整块作为纯文本
					$preContent = substr($this->content, $this->offset, $nextPreEnd + 6 - $this->offset);
					$this->addTextNode($nodes, $preContent);
					$this->offset = $nextPreEnd + 6;
				} else {
					// 没找到结束标签，剩余全部作为文本
					$this->addTextNode($nodes, substr($this->content, $this->offset));
					$this->offset = $this->length;
				}
				continue;
			}

			// 情况 C：先遇到了自定义标签 {
			if ($nextBrace !== false) {
				$this->addTextNode($nodes, substr($this->content, $this->offset, $nextBrace - $this->offset));
				$this->offset = $nextBrace + 1;
				$node = $this->parseTag();
				if ($node) $nodes[] = $node;
			}
		}
		return $nodes;
	}

	private function parseTag()
	{
		$tagName = $this->parseTagName();
		if ($tagName === '') return ['type' => 'text', 'content' => '{'];

		$attrs = $this->parseAttributes();
		$this->skipWhitespace();

		// 检查自闭合标签
		if ($this->offset < $this->length && $this->content[$this->offset] === '/') {
			$this->offset++;
			$this->skipWhitespace();
			if ($this->offset < $this->length && $this->content[$this->offset] === '}') {
				$this->offset++;
				return ['type' => 'tag', 'tag' => $tagName, 'attributes' => $attrs, 'children' => []];
			}
		}

		// 检查闭合标签开始
		if ($this->offset < $this->length && $this->content[$this->offset] === '}') {
			$this->offset++;
			$children = $this->parseNodesUntilClosingTag($tagName);
			return ['type' => 'tag', 'tag' => $tagName, 'attributes' => $attrs, 'children' => $children];
		}

		return ['type' => 'text', 'content' => '{' . $tagName . $this->getCurrentSlice()];
	}

	private function parseTagName()
	{
		$name = '';
		while ($this->offset < $this->length && (
			ctype_alnum($this->content[$this->offset]) ||
			$this->content[$this->offset] === '_' ||
			$this->content[$this->offset] === '-'
		)) {
			$name .= $this->content[$this->offset++];
		}
		return $name;
	}

	private function parseAttributes()
	{
		$attrs = [];
		$this->skipWhitespace();
		while ($this->offset < $this->length) {
			$char = $this->content[$this->offset];
			if ($char === '}' || $char === '/') break;

			$attrName = $this->parseAttrName();
			if ($attrName === '') {
				$this->offset++;
				continue;
			}

			$this->skipWhitespace();
			if ($this->offset < $this->length && $this->content[$this->offset] === '=') {
				$this->offset++;
				$this->skipWhitespace();
				$attrs[$attrName] = $this->parseAttrValue();
			}
			$this->skipWhitespace();
		}
		return $attrs;
	}

	private function parseAttrName()
	{
		$name = '';
		while ($this->offset < $this->length && (ctype_alnum($this->content[$this->offset]) || $this->content[$this->offset] === '_' || $this->content[$this->offset] === '-')) {
			$name .= $this->content[$this->offset++];
		}
		return $name;
	}

	private function parseAttrValue()
	{
		$value = '';
		if ($this->offset < $this->length && $this->content[$this->offset] === '"') {
			$this->offset++;
			while ($this->offset < $this->length) {
				$char = $this->content[$this->offset];
				if ($char === '"') {
					$this->offset++;
					break;
				}
				if ($char === '\\' && $this->offset + 1 < $this->length) {
					$value .= $this->content[++$this->offset];
				} else {
					$value .= $char;
				}
				$this->offset++;
			}
		}
		return $value;
	}

	private function parseNodesUntilClosingTag($closingTagName)
	{
		$nodes = [];
		while ($this->offset < $this->length) {
			// 原代码
			// $nextBrace = strpos($this->content, '{', $this->offset);

			// 在闭合标签查找逻辑中，同样需要跳过 <pre> 块
			$nextPreStart = stripos($this->content, '<pre', $this->offset);
			$nextBrace = strpos($this->content, '{', $this->offset);

			if ($nextPreStart !== false && ($nextBrace === false || $nextPreStart < $nextBrace)) {
				$this->addTextNode($nodes, substr($this->content, $this->offset, $nextPreStart - $this->offset));
				$this->offset = $nextPreStart;
				$nextPreEnd = stripos($this->content, '</pre>', $this->offset);
				if ($nextPreEnd !== false) {
					$preContent = substr($this->content, $this->offset, $nextPreEnd + 6 - $this->offset);
					$this->addTextNode($nodes, $preContent);
					$this->offset = $nextPreEnd + 6;
				} else {
					$this->addTextNode($nodes, substr($this->content, $this->offset));
					$this->offset = $this->length;
				}
				continue;
			}
			// 在闭合标签查找逻辑中，同样需要跳过 <pre> 块

			if ($nextBrace === false) {
				$this->addTextNode($nodes, substr($this->content, $this->offset));
				$this->offset = $this->length;
				break;
			}

			$this->addTextNode($nodes, substr($this->content, $this->offset, $nextBrace - $this->offset));
			$this->offset = $nextBrace + 1;
			$this->skipWhitespace();

			if ($this->offset < $this->length && $this->content[$this->offset] === '/') {
				$this->offset++;
				$this->skipWhitespace();
				$tagName = $this->parseTagName();
				$this->skipWhitespace();
				if ($this->offset < $this->length && $this->content[$this->offset] === '}') {
					$this->offset++;
					if ($tagName === $closingTagName) return $nodes;
					$nodes[] = ['type' => 'text', 'content' => "{/$tagName}"];
				}
			} else {
				$node = $this->parseTag();
				if ($node) $nodes[] = $node;
			}
		}
		return $nodes;
	}

	private function addTextNode(&$nodes, $text)
	{
		if ($text !== '') $nodes[] = ['type' => 'text', 'content' => $text];
	}

	private function skipWhitespace()
	{
		while ($this->offset < $this->length && ctype_space($this->content[$this->offset])) $this->offset++;
	}

	private function getCurrentSlice()
	{
		return substr($this->content, $this->offset);
	}

	private function restoreTag($node)
	{
		$html = '{' . $node['tag'];
		foreach ($node['attributes'] as $k => $v) {
			$html .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '"';
		}
		if (empty($node['children'])) {
			$html .= ' /}';
		} else {
			$html .= '}' . $this->render($node['children']) . '{/' . $node['tag'] . '}';
		}
		return $html;
	}
}
