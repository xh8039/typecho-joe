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

if ($this->request->get('tab') === 'favorite') {
?>
	<div class="ajax-item-header flex jsb mb10 px12-sm">
		<div class="mr10"><a rel="nofollow" href="javascript:;" class=" c-theme badg mr6">文章<count class="ml3 em09">0</count></a></div>
		<div class="dropdown flex0 pull-right">
			<a class="but" href="javascript:;" data-toggle="dropdown">排序<i class="fa fa-caret-down opacity5 ml6" aria-hidden="true" style="margin-right: 0;"></i></a>
			<ul class="dropdown-menu">
				<li class="active"><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=post__in">收藏时间</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=date">最新发布</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=modified">最近更新</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=views">最多查看</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=like">最多点赞</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=comment_count">最多回复</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=favorite_count">最多收藏</a></li>
				<li><a rel="nofollow" ajax-replace="true" class="ajax-next" href="?tab=favorite&#038;orderby=sales_volume">销售数量</a></li>
			</ul>
		</div>
	</div>
	<div class="text-center ajax-item" style="padding:100px 0;">
		<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg', null) ?>">
		<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
	</div>
	<div class="ajax-pag hide">
		<div class="next-page ajax-next"><a href="#"></a></div>
	</div>
<?php
} else {
?>
	<span class="post_ajax_trigger hide"><a href="?tab=favorite" class="ajax_load ajax-next ajax-open"></a></span>
<?php
}
?>
<div class="post_ajax_loader" style="display: none;">
	<?php
	for ($i=0; $i < 4; $i++) { 
	?>
	<div class="posts-item flex">
		<div class="post-graphic"><div class="radius8 item-thumbnail placeholder"></div></div>
		<div class="item-body flex xx flex1 jsb">
			<p class="placeholder t1"></p>
			<h4 class="item-excerpt placeholder k1"></h4>
			<p class="placeholder k2"></p>
			<i><i class="placeholder s1"></i><i class="placeholder s1 ml10"></i></i>
		</div>
	</div>
	<?php
	}
	?>
</div>