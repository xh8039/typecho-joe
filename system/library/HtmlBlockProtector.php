<?php

namespace joe\library;

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
class HtmlBlockProtector
{
	private $blocks = [];
	private $tags = [];
	private $placeholderPrefix = '___PROTECTED_BLOCK_';
	private $placeholderSuffix = '___';

	/**
	 * 构造函数
	 * @param array $tags 需要保护的标签列表，例如 ['pre', 'code', 'textarea']
	 */
	public function __construct($tags = ['pre'])
	{
		$this->tags = $tags;
	}

	/**
	 * 步骤1：保护内容，将指定标签替换为占位符
	 * @param string $content
	 * @return string
	 */
	public function protect($content)
	{
		$this->blocks = [];

		if (empty($this->tags)) {
			return $content;
		}

		// 构建正则：(?s)(<(pre|code)\b.*?</\2>)
		// \2 是反向引用，确保开始标签和结束标签一致
		$tagPattern = implode('|', array_map('preg_quote', $this->tags));
		$pattern = "#(?s)(<($tagPattern)\\b.*?</\\2>)#i";

		$content = preg_replace_callback($pattern, function ($matches) {
			$index = count($this->blocks);
			$this->blocks[] = $matches[1]; // matches[1] 是完整的标签内容
			return $this->placeholderPrefix . $index . $this->placeholderSuffix;
		}, $content);

		return $content;
	}

	/**
	 * 步骤2：恢复内容，将占位符替换回原HTML
	 * @param string $content
	 * @return string
	 */
	public function restore($content)
	{
		foreach ($this->blocks as $index => $blockHtml) {
			$placeholder = $this->placeholderPrefix . $index . $this->placeholderSuffix;
			$content = str_replace($placeholder, $blockHtml, $content);
		}
		return $content;
	}
}
