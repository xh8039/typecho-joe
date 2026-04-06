<?php

namespace joe\library;

class PreBlockProtector
{
	private $blocks = [];
	private $placeholderPrefix = '___PRE_BLOCK_PROTECTED_';
	private $placeholderSuffix = '___';

	// 步骤1：保护代码块，将其替换为占位符
	public function protect($content)
	{
		$this->blocks = [];
		// 使用 (?s) 让 . 也能匹配换行符，i 不区分大小写
		$content = preg_replace_callback('#(?s)(<pre\b.*?</pre>)#i', function ($matches) {
			$index = count($this->blocks);
			$this->blocks[] = $matches[1];
			return $this->placeholderPrefix . $index . $this->placeholderSuffix;
		}, $content);
		return $content;
	}

	// 步骤2：恢复代码块，将占位符替换回原文
	public function restore($content)
	{
		foreach ($this->blocks as $index => $blockHtml) {
			$placeholder = $this->placeholderPrefix . $index . $this->placeholderSuffix;
			$content = str_replace($placeholder, $blockHtml, $content);
		}
		return $content;
	}
}

class MarkdownTagParser
{
	private $content;
	private $length;
	private $offset = 0;

	public function parse($content)
	{
		// 【新增】这里的 content 已经是被保护过的了，不需要再处理 <pre>
		$this->content = $content;
		$this->length = strlen($content);
		$this->offset = 0;
		return $this->parseNodes();
	}

	public function render($nodes, $callbacks = [])
	{
		$html = '';
		foreach ($nodes as $node) {
			if ($node['type'] === 'text') {
				$html .= $node['content']; // 不转义，因为可能包含占位符
			} elseif ($node['type'] === 'tag') {
				$tagName = $node['tag'];
				if (isset($callbacks[$tagName])) {
					$childrenHtml = $this->render($node['children'], $callbacks);
					if (is_callable($callbacks[$tagName])) {
						$html .= $callbacks[$tagName]($node['attributes'], $childrenHtml);
					} else {
						$html .= $callbacks[$tagName];
					}
				} else {
					$html .= $this->restoreTag($node);
				}
			}
		}
		return $html;
	}

	// --- 内部解析方法 (简化版，不需要 pre 逻辑) ---

	private function parseNodes()
	{
		$nodes = [];
		while ($this->offset < $this->length) {
			$nextBrace = strpos($this->content, '{', $this->offset);
			if ($nextBrace === false) {
				$this->addTextNode($nodes, substr($this->content, $this->offset));
				$this->offset = $this->length;
				break;
			}
			$this->addTextNode($nodes, substr($this->content, $this->offset, $nextBrace - $this->offset));
			$this->offset = $nextBrace + 1;
			$node = $this->parseTag();
			if ($node) $nodes[] = $node;
		}
		return $nodes;
	}

	private function parseTag()
	{
		$tagName = $this->parseTagName();
		if ($tagName === '') return ['type' => 'text', 'content' => '{'];

		$attrs = $this->parseAttributes();
		$this->skipWhitespace();

		if ($this->offset < $this->length && $this->content[$this->offset] === '/') {
			$this->offset++;
			$this->skipWhitespace();
			if ($this->offset < $this->length && $this->content[$this->offset] === '}') {
				$this->offset++;
				return ['type' => 'tag', 'tag' => $tagName, 'attributes' => $attrs, 'children' => []];
			}
		}

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
		while ($this->offset < $this->length && (ctype_alnum($this->content[$this->offset]) || $this->content[$this->offset] === '_' || $this->content[$this->offset] === '-')) {
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
			$nextBrace = strpos($this->content, '{', $this->offset);
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
