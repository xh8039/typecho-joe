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

class BlockProtector
{
    private $blocks = [];
    private $placeholderPrefix = '___PROTECTED_BLOCK_';
    private $placeholderSuffix = '___';

    /**
     * 构造函数
     */
    public function __construct()
    {
        // 针对MD语法，内部预设规则
    }

    /**
     * 步骤1：保护内容，将 Markdown 代码块替换为占位符
     * 优先级：先保护 ``` 块，再保护 ` 行内块，防止冲突
     * @param string $content
     * @return string
     */
    public function protect($content)
    {
        $this->blocks = [];

        // 1. 匹配 fences 代码块 (```...```) ✅ 修复正则+去除首尾多余空白
        // 修饰符：s=点匹配换行 | m=多行模式 | g=全局匹配所有
        $patternFence = '#(?s)(^```.*?^```\s*$)#m';

        $content = preg_replace_callback($patternFence, function ($matches) {
            $index = count($this->blocks);
            // 🔥 核心修复：trim() 去除代码块首尾多余的换行、Tab、空格（保留内部格式）
            $block = trim($matches[1]);
            $this->blocks[] = $block;
            return $this->placeholderPrefix . $index . $this->placeholderSuffix;
        }, $content);

        // 2. 匹配行内代码 (`code`) ✅ 修复全局匹配+去除首尾空白
        $patternInline = '#(?<!`)`(?!`)(.+?)(?<!`)`(?!`)#';

        $content = preg_replace_callback($patternInline, function ($matches) {
            $index = count($this->blocks);
            // 🔥 核心修复：trim() 清理行内代码多余空白
            $block = trim($matches[0]);
            $this->blocks[] = $block;
            return $this->placeholderPrefix . $index . $this->placeholderSuffix;
        }, $content);

        return $content;
    }

    /**
     * 步骤2：恢复内容，将占位符替换回原 Markdown 代码块
     * @param string $content
     * @return string
     */
    public function restore($content)
    {
        foreach ($this->blocks as $index => $blockMd) {
            $placeholder = $this->placeholderPrefix . $index . $this->placeholderSuffix;
            $content = str_replace($placeholder, $blockMd, $content);
        }
        return $content;
    }
}
