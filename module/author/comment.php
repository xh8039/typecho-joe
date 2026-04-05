<?php
if ($this->request->get('tab') === 'comment') {
?>
	<div class="text-center ajax-item" style="padding:60px 0;">
		<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg', null) ?>">
		<p style="margin-top:60px;" class="em09 muted-3-color separator">暂无评论内容</p>
	</div>
	<div class="ajax-pag hide">
		<div class="next-page ajax-next">
			<a href="#"></a>
		</div>
	</div>
<?php
} else {
?>
	<span class="post_ajax_trigger hide">
		<a href="?tab=comment" class="ajax_load ajax-next ajax-open"></a>
	</span>
<?php
}
?>
<div class="post_ajax_loader" style="display: none;">
	<?php
	for ($i=0; $i < 6; $i++) { 
		echo '<div class="posts-item no_margin"><div class="author-set-left"><div class="placeholder k2"></div></div><div class="author-set-right"><div class="placeholder t1 mb10"></div><i><i class="placeholder s1"></i><i class="placeholder s1 ml10"></i></i></div></div>';
	}
	?>
</div>