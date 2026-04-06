<?php

namespace joe\library;

/**
 * @package ElementBuilder
 * @description 动态创建HTML的Element标签
 * @author 易航
 * @version 1.3（新增子元素链式调用支持）
 * @link http://blog.yihang.info
 */
class ElementBuilder
{
	// HTML标准自闭合标签列表
	private const SELF_CLOSING_TAGS = ['img', 'input', 'br', 'hr', 'meta', 'link', 'base', 'embed', 'param', 'source', 'track', 'wbr'];

	private array $options = [
		'element' => 'div',
		'inner' => null,
		'attributes' => []
	];

	// 新增：存储子元素实例的数组
	private array $children = [];

	private ?ElementBuilder $parent = null; // 新增：记录父元素

	private static function attributes(array $attributes): string
	{
		$attrStr = '';
		foreach ($attributes as $key => $value) {
			// 1. 过滤空属性名 / 非法属性名
			if (!is_string($key) || trim($key) === '') continue;

			// 2. 布尔属性处理（disabled、checked、selected 等）
			if (is_bool($value)) {
				if ($value === true) $attrStr .= " {$key}=\"true\"";
				continue;
			}

			// 3. 过滤 null/空字符串属性（不输出）
			if ($value === null || $value === '') continue;

			// 4. 核心：强制转义属性值，防止XSS攻击（最关键的安全修复）
			$escapedValue = htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
			$attrStr .= " {$key}=\"{$escapedValue}\"";
		}
		return $attrStr;
	}

	public function __construct(string $element)
	{
		// 修复：过滤非法标签名，防止恶意HTML结构
		$this->options['element'] = self::filterElementName($element);
	}

	/**
	 * 设置标签内部的HTML内容
	 * @param $innerHTML 要设置的标签HTML内容
	 * @return $this
	 */
	public function innerHTML($innerHTML): self
	{
		$this->options['inner'] = $innerHTML;
		return $this;
	}

	/**
	 * 设置标签内部的文本内容（修复XSS漏洞）
	 * @param $innerText 要设置的标签文本内容
	 * @return $this
	 */
	public function innerText($innerText): self
	{
		// 修复：指定编码+完整转义，彻底防止XSS
		$this->options['inner'] = htmlentities((string)$innerText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
		return $this;
	}

	/**
	 * 批量设置标签的属性（修复非法属性名过滤）
	 * @param array|string $attributes
	 * @param mixed $content
	 * @return $this
	 */
	public function attr($attributes, $content = null): self
	{
		if (is_array($attributes)) {
			foreach ($attributes as $key => $value) {
				// 修复：过滤非法属性名
				if (self::isValidAttributeName($key)) {
					$this->options['attributes'][$key] = $value;
				}
			}
		}

		if (is_string($attributes) && self::isValidAttributeName($attributes)) {
			$this->options['attributes'][$attributes] = $content;
		}
		return $this;
	}

	/**
	 * 便捷方法：添加 CSS 类名（支持多个，自动去重）
	 * @param string|array $classes 类名（字符串用空格分隔 或 数组）
	 * @return $this
	 */
	public function class($classes): self
	{
		// 获取已有 class
		$existingClasses = isset($this->options['attributes']['class']) ? explode(' ', $this->options['attributes']['class']) : [];
		// 处理输入
		$newClasses = is_array($classes) ? $classes : explode(' ', trim($classes));
		// 合并去重、过滤空值
		$mergedClasses = array_unique(array_filter(array_merge($existingClasses, $newClasses)));
		// 回写
		$this->options['attributes']['class'] = implode(' ', $mergedClasses);
		return $this;
	}

	/**
	 * 便捷方法：添加内联样式
	 * @param string|array $property 样式属性名 或 样式关联数组
	 * @param string|null $value 样式值（当 $property 为字符串时必须传）
	 * @return $this
	 */
	public function style($property, $value = null): self
	{
		// 获取已有 style 并解析为数组
		$existingStyles = [];
		if (isset($this->options['attributes']['style'])) {
			$styleString = rtrim($this->options['attributes']['style'], ';');
			foreach (explode(';', $styleString) as $pair) {
				list($k, $v) = explode(':', $pair, 2);
				$existingStyles[trim($k)] = trim($v);
			}
		}

		// 处理输入
		if (is_array($property)) {
			// 数组批量合并
			$newStyles = array_merge($existingStyles, $property);
		} elseif (is_string($property) && $value !== null) {
			// 单个键值对
			$existingStyles[$property] = $value;
			$newStyles = $existingStyles;
		} else {
			return $this;
		}

		// 构建 style 字符串
		$styleStr = '';
		foreach ($newStyles as $k => $v) $styleStr .= trim($k) . ':' . trim($v) . ';';

		// 回写
		$this->options['attributes']['style'] = $styleStr;

		return $this;
	}

	// 新增：添加子元素的链式方法
	/**
	 * 添加子元素 (链式调用后，后续操作将作用于子元素)
	 * @param string $element 子元素标签名
	 * @return self 子元素实例
	 */
	public function child(string $element): self
	{
		$child = new self($element);
		$child->parent = $this; // 子元素记录父元素
		$this->children[] = $child;
		return $child;
	}

	// 新增：回到父元素
	public function parent(): ?self
	{
		return $this->parent;
	}

	/**
	 * 获取生成的HTML内容
	 * @return string
	 */
	public function get($html = null): string
	{
		if ($html) $this->innerHTML($html);
		$element = $this->options['element'];
		$content = $this->options['inner'];

		// 修改：拼接内容 = 原有文本 + 所有子元素的HTML
		$content = $this->options['inner'] ?? '';
		foreach ($this->children as $child) {
			$content .= $child->get(); // 递归渲染子元素
		}

		$attributes = self::attributes($this->options['attributes']);

		// 修复：标准自闭合标签判断（原逻辑 $content===false 完全错误）
		if (in_array(strtolower($element), self::SELF_CLOSING_TAGS, true)) {
			return "<{$element}{$attributes} />";
		}

		// 普通标签渲染
		return "<{$element}{$attributes}>{$content}</{$element}>";
	}

	public function __toString(): string
	{
		return $this->get($this->options['inner']);
	}

	/**
	 * 过滤合法的HTML标签名（仅允许字母、数字、-、_）
	 */
	private static function filterElementName(string $element): string
	{
		return preg_replace('/[^a-zA-Z0-9\-_]/', '', strtolower(trim($element))) ?: 'div';
	}

	/**
	 * 验证合法的属性名
	 */
	private function isValidAttributeName(string $name): bool
	{
		return preg_match('/^[a-zA-Z0-9\-_:]+$/', trim($name)) === 1;
	}
}
