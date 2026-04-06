<?php

namespace joe\markdown;

/*
 * @Author        : 易航
 * @Url           : blog.yihang.info
 * @Date          : 2026-03-25 00:00:00
 * @LastEditTime  : 2026-03-27 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : Joe主题
 * @Description   : 一款优雅极速的Typecho主题
 * @Read me       : 感谢您使用Joe主题，主题源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版主题会存在各种未知风险。支持正版，从我做起！
 */

class TagParser
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
					if (is_callable($callbacks[$tagName])) {
						$html .= $callbacks[$tagName]($node, $childrenHtml, $this, $callbacks);
					} else if ($callbacks[$tagName] === '$childrenHtml') {
						$html .= $childrenHtml;
					} else {
						$html .= $callbacks[$tagName];
					}
				} else {
					// 未定义回调的标签，原样输出
					$html .= $this->restoreTag($node);
				}
			}
		}
		return $html;
	}

	// --- 内部解析方法 ---
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

			// --- 新增逻辑开始 ---
			$backupOffset = $this->offset; // 1. 保存当前指针位置
			$result = $this->parseNodesUntilClosingTag($tagName); // 接收子节点+是否找到闭合标签
			$children = $result['nodes'];
			// 2. 仅当「未找到闭合标签」时，才回退指针并返回自闭合标签
			if (!$result['found']) {
				// 3. 没找到！指针回退，假装这是个自闭合标签
				$this->offset = $backupOffset;
				return ['type' => 'tag', 'tag' => $tagName, 'attributes' => $attrs, 'children' => []];
			}
			// --- 新增逻辑结束 ---

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
		$found = false; // 标记是否找到匹配的闭合标签
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
					if ($tagName === $closingTagName) {
						$found = true; // 找到匹配的闭合标签
						break;
					}
					$nodes[] = ['type' => 'text', 'content' => "{/$tagName}"];
				}
			} else {
				$node = $this->parseTag();
				if ($node) $nodes[] = $node;
			}
		}
		// 返回子节点 + 是否找到闭合标签
		return ['nodes' => $nodes, 'found' => $found];
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
