<?php
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

?>
<form class="joe_detail__article-protected" action="<?= $this->security->getTokenUrl($this->permalink) ?>">
	<div class="contain">
		<svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
			<use xlink:href="#icon-joe-article-password"></use>
		</svg>
		<input type="hidden" name="protectCID" value="<?= $this->cid ?>" />
		<input class="password" name="protectPassword" type="password" placeholder="请输入访问密码...">
		<button class="submit" type="submit" value="提交">确定</button>
	</div>
</form>