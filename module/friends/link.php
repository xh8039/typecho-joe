<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
$friends = think\facade\Db::name('friends')->where('status', 1)->whereFindInSet('position', 'single')->order('order', 'desc')->select();
if ($friends->isEmpty()) return;
if ($this->options->JFriends_shuffle == 'on') $friends = $friends->shuffle();
?>
<div class="links-box links-style-card">
	<?php
	foreach ($friends as $friend) {
	?><div class="author-minicard links-card radius8">
		<a target="_blank" href="<?= $friend['url'] ?>" title="<?= $friend['description'] ?>" rel="<?= joe_detect_spider() ? $friend['rel'] : '' ?>">
				<ul class="list-inline">
					<li>
						<div class="avatar-img link-img">
							<img onerror="this.src='<?= joe_avatar_lazyload_url() ?>'" class="lazyload avatar" src="<?= joe_theme_url('assets/img/thumbnail-sm.svg') ?>" data-src="<?= empty($friend['logo']) ? joe_avatar_lazyload_url() : $friend['logo'] ?>">
						</div>
					</li>
					<li>
						<dl>
							<dt class="text-ellipsis"><?= $friend['title'] ?></dt>
							<dd class="mt3 avatar-dest em09 muted-3-color text-ellipsis"><?= $friend['description'] ?></dd>
						</dl>
					</li>
				</ul>
			</a>
		</div><?php
	}
	?>
</div>