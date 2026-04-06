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
<div id="postcomments">
	<ol class="commentlist list-unstyled">
		<?php
		$this->comments()->to($comments);
		if ($comments->have()) {
		?>
			<div class="comment-filter tab-nav-theme flex ac jsb" win-ajax-replace="comment-order-btn">
				<ul class="list-inline comment-order-box" style="padding:0;">
					<li class="mr6 active">
						<a rel="nofollow" class="comment-orderby" href="?corderby=comment_date_gmt">最新</a>
					</li>
					<li class="">
						<a rel="nofollow" class="comment-orderby" href="?corderby=comment_like">最热</a>
					</li>
				</ul>
				<a rel="nofollow" class="but comment-orderby btn-only-author p2-10" href="?only_author=1">只看作者</a>
			</div>
			<?php
			$comments->listComments(['before' => false, 'after' => false]);
			echo '<div style="display:none;" class="post_ajax_loader">';
			for ($i = 0; $i < (int)$this->options->commentsPageSize; $i++) {
				echo ' <ul class="list-inline flex"><div class="avatar-img placeholder radius"></div><li class="flex1"><div class="placeholder s1 mb6" style="width: 30%;"></div><div class="placeholder k2 mb10"></div><i class="placeholder s1 mb6"></i><i class="placeholder s1 mb6 ml10"></i></li></ul>';
			}
			echo '</div>';
			$comments->pageNav('<i class="fa fa-angle-left em12"></i><span class="hide-sm ml6">上一页</span>','<span class="hide-sm mr6">下一页</span><i class="fa fa-angle-right em12"></i>',1,'...',[
				'wrapTag' => 'div',
				'wrapClass' => 'pagenav',
				'itemTag' => '',
				'textTag' => 'a',
				'currentClass' => 'current',
				'prevClass' => 'prev',
				'nextClass' => 'next'
			]);
			?>
		<?php
		} else {
		?>
			<div class="text-center comment comment-null" style="padding:40px 0;">
				<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null.svg', null) ?>">
				<p style="margin-top:40px;" class="em09 muted-3-color separator">暂无评论内容</p>
			</div>
			<div class="pagenav hide">
				<div class="next-page ajax-next">
					<a href="#"></a>
				</div>
			</div>
		<?php
		}
		?>
	</ol>
</div>