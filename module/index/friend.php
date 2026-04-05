<?php

use think\facade\Db;

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
if ($this->options->JFriends_Spider_Hide == 'on' && joe_detect_spider()) return;
$friends = Db::name('friends')->where('status', 1)->whereFindInSet('position', 'index_bottom')->order('order', 'desc')->select();
if ($friends->isEmpty()) return;

$friends_page_url = null;
$friends_page = Db::name('contents')->where(['type' => 'page', 'template' => 'friend.php', 'status' => 'publish'])->find();
if ($friends_page) {
	$friends_page_pathinfo = Typecho\Router::url('page', $friends_page);
	$friends_page_url = Typecho\Common::url($friends_page_pathinfo, $this->options->index);
	$friends_page_url = joe_root_relative_link($friends_page_url);
}
if ($this->options->JFriends_shuffle == 'on') $friends = $friends->shuffle();
?>
<div class="links-widget mb20">
	<div class="box-body notop">
		<div class="title-theme">友情链接<?= $friends_page_url ? '<div class="pull-right em09 mt3"><a href="' . $friends_page_url . '" class="muted-2-color"><i class="fa fa-angle-right fa-fw"></i>申请友链</a></div>' : '' ?></div>
	</div>
	<div class="links-box links-style-simple zib-widget">
		<?php
		foreach ($friends as $key => $friend) {
		?>
			<a rel="<?= $friend['rel'] ?>" target="_blank" class="<?= $key ? 'icon-spot' : '' ?>" data-trigger="hover" data-toggle="popover" data-placement="top" title="<?= $friend['title'] ?>" data-content="<?= empty($friend['description']) ? '暂无简介' : $friend['description'] ?>" href="<?= $friend['url'] ?>"><?= $friend['title'] ?></a>
		<?php
		}
		if ($friends_page_url) echo '<a class="icon-spot" href="' . $friends_page_url . '">查看更多</a>';
		?>
	</div>
</div>