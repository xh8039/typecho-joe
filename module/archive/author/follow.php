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

if ($this->request->get('tab') === 'follow') {
?>
	<ul class="ajax-item list-inline splitters relative mb10 mt10">
		<li><a rel="nofollow" ajax-replace="true" class="ajax-next focus-color" href="<?= joe_api_url('author_follow',['user_id'=>$author]) ?>/admin-ajax.php?user_id=1&type=followed&action=author_follow">粉丝 0</a></li>
		<li><a rel="nofollow" ajax-replace="true" class="ajax-next muted-color" href="/wp-admin/admin-ajax.php?user_id=1&type=follow&action=author_follow">关注 0</a></li>
	</ul>
	<div class="text-center ajax-item" style="padding:40px 0;">
		<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-love.svg') ?>">
		<p style="margin-top:40px;" class="em09 muted-3-color separator">暂无粉丝</p>
	</div>
	<div class="ajax-pag hide">
		<div class="next-page ajax-next"><a href="#"></a></div>
	</div>
<?php
} else {
?>
	<span class="post_ajax_trigger hide"><a href="?tab=follow" class="ajax_load ajax-next ajax-open"></a></span>
<?php
}
?>
<div class="post_ajax_loader" style="display: none;">
	<?php
	for ($i=0; $i < 6; $i++) { 
	?>
	<div class="author-minicard radius8 flex ac" style="display: inline-flex;margin:5px 8px;">
		<div class="avatar-img mr10"><div class="avatar placeholder"></div></div>
		<div class="flex1">
			<div class="placeholder k1 mb6"></div>
			<i><i class="placeholder s1"></i><i class="placeholder s1 ml10"></i></i>
		</div>
	</div>
	<?php
	}
	?>
</div>