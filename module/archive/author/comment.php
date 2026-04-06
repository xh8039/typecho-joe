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

use think\facade\Db;

if ($this->request->get('tab') === 'comment') {
	$comments_total = joe_user_comment_count($uid);
	$comments = Widget_Comments_Author::alloc(['uid' => $uid]);
	$page = $this->request->filter('int')->get('page', 1);
	if ($comments->have()) {
		$total = 0;
		while ($comments->next()) {
			if ($comments->parent) {
				$parent = Db::name('comments')->where('coid', $comments->parent)->find();
			} else {
				$parent = null;
			}
			?><div class="ajax-item posts-item no_margin"><div class="author-set-left" title="<?= $comments->date->format($this->options->commentDateFormat) ?>"><?= joe_date_word($comments->dateWord) ?></div><div class="author-set-right"><div class="mb10 comment-content"><a class="muted-color text-ellipsis-5" href="<?= $comments->permalink ?>"><?= joe_parse_comment_reply($comments->text) ?></a></div><div class="muted-2-color em09 text-ellipsis"><?= $parent ? '<span class="mr10">@' . $parent['author'] . '</span>' : '' ?>评论于：<a class="muted-color" href="<?= $comments->parentContent->permalink ?>"><?= $comments->parentContent->title ?></a></div></div></div><?php
		}
		if ($comments_total > ($page * $this->options->commentsPageSize)) {
			?><div class="text-center theme-pagination ajax-pag"><div class="next-page ajax-next"><a href="?tab=comment&page=<?= $page + 1 ?>" paginate-all="<?= $comments_total ?>" paginate-perpage="<?= $this->options->commentsPageSize ?>"><i class="fa fa-angle-right"></i>加载更多</a></div></div><?php
		}
	} else {
		?>
		<div class="text-center ajax-item" style="padding:60px 0;">
			<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg', null) ?>">
			<p style="margin-top:60px;" class="em09 muted-3-color separator">暂无评论内容</p>
		</div>
		<div class="ajax-pag hide"><div class="next-page ajax-next"><a href="#"></a></div></div>
		<?php
	}
} else {
	?><span class="post_ajax_trigger hide"><a href="?tab=comment" class="ajax_load ajax-next ajax-open"></a></span><?php
}
?>
<div class="post_ajax_loader" style="display: none;">
	<?php
	for ($i = 0; $i < $this->options->commentsPageSize; $i++) {
		echo '<div class="posts-item no_margin"><div class="author-set-left"><div class="placeholder k2"></div></div><div class="author-set-right"><div class="placeholder t1 mb10"></div><i><i class="placeholder s1"></i><i class="placeholder s1 ml10"></i></i></div></div>';
	}
	?>
</div>