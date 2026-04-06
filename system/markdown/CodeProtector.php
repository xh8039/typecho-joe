<?php

namespace joe\markdown;

/*
 * @Author        : 易航
 * @Url           : blog.yihang.info
 * @Date          : 2026-03-25 00:00:00
 * @LastEditTime  : 2026-04-02 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : Joe主题
 * @Description   : 一款优雅极速的Typecho主题，新增MD代码块保护功能（修复多余空白符）
 * @Read me       : 感谢您使用Joe主题，主题源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版主题会存在各种未知风险。支持正版，从我做起！
 */

class CodeProtector
{
	/**
	 * 占位符与原始代码块的映射表
	 * @var array
	 */
	private $placeholderMap = [];

	/**
	 * 提取代码块并替换为占位符
	 * @param string $content 原始 Markdown 内容
	 * @return string 替换后的内容
	 */
	public function extract($content)
	{
		$this->placeholderMap = [];
		$index = 0;

		// 正则优先级：块级代码 > 行内代码，避免行内匹配干扰块级
		$pattern = '/(```[\s\S]*?```)|(`[^`]+`)/';

		return preg_replace_callback($pattern, function ($matches) use (&$index) {
			$placeholder = "___CODE_BLOCK_{$index}___";
			$this->placeholderMap[$placeholder] = $matches[0];
			$index++;
			return $placeholder;
		}, $content);
	}

	/**
	 * 从占位符恢复原始代码块
	 * @param string $content 处理后的内容
	 * @return string 恢复后的完整内容
	 */
	public function restore($content)
	{
		return strtr($content, $this->placeholderMap);
	}
}
