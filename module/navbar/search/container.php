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

?><div mini-touch="nav_search" touch-direction="top" class="main-search fixed-body main-bg box-body navbar-search nopw-sm">
	<div class="container">
		<div class="mb20">
			<button class="close" data-toggle-class data-target=".navbar-search">
				<svg class="ic-close" aria-hidden="true">
					<use xlink:href="#icon-close"></use>
				</svg>
			</button>
		</div>
		<div remote-box="<?= joe_api_url('search_box') ?>" load-click>
			<div class="search-input">
				<p><i class="placeholder s1 mr6"></i><i class="placeholder s1 mr6"></i><i class="placeholder s1 mr6"></i></p>
				<p class="placeholder k2"></p>
				<p class="placeholder t1"></p>
				<p><i class="placeholder s1 mr6"></i><i class="placeholder s1 mr6"></i><i class="placeholder s1 mr6"></i><i class="placeholder s1 mr6"></i></p>
				<p class="placeholder k1"></p>
				<p class="placeholder t1"></p>
				<p></p>
				<p class="placeholder k1" style="height: 80px;"></p>
			</div>
		</div>
	</div>
</div>