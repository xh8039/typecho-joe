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
?><div class="theme-box">
	<div class="box-body notop">
		<div class="title-theme">最近评论</div>
	</div>
	<div class="box-body comment-mini-lists zib-widget">
		<?php
		$this->widget('Widget\Comments\Recent', 'ignoreAuthor=true&pageSize=5')->to($item);
		while ($item->next()) {
			?>
			<div class="posts-mini">
			<span class="avatar-img">
				<img alt="头像" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_avatar_url_by_mail($item->mail) ?>" class="lazyload avatar avatar-id-0">
			</span>
			<div class="posts-mini-con em09 ml10 flex xx jsb">
				<p class="flex jsb">
					<span class="flex1 flex"><?php $item->author(false) ?><span class="flex0 icon-spot muted-3-color" title="<?php $item->date('Y-m-d H:i:s'); ?>"><?= joe_date_word($item->dateWord) ?></span></span>
					<span class="ml10 flex0"><a href="javascript:;" data-action="comment_like" class="action action-comment-like pull-right muted-2-color" data-pid="<?= $item->coid ?>"><svg class="icon mr3" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><text></text><count><?= $item->agree ?></count></a></span>
				</p>
				<a class="muted-color text-ellipsis-5" href="<?= joe_relative_url($item->permalink) ?>"><?= joe_parse_comment_reply($item->text) ?></a>
			</div>
			</div>
			<?php
		}
		?>
	</div>
</div>