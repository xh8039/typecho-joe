<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
$thePrev = joe_thePrev($this);
$theNext = joe_theNext($this);
if ($thePrev || $theNext) {
?>
	<div class="theme-box" style="height:99px">
		<nav class="article-nav">
			<div class="main-bg box-body radius8 main-shadow">
				<a href="<?= $thePrev ? joe_root_relative_link($thePrev['permalink']) : 'javascript:;' ?>">
					<p class="muted-2-color"><i class="fa fa-angle-left em12"></i><i class="fa fa-angle-left em12 mr6"></i>上一篇</p>
					<div class="text-ellipsis-2"><?= $thePrev ? $thePrev['title'] : '无更多文章' ?></div>
				</a>
			</div>
			<div class="main-bg box-body radius8 main-shadow">
				<a href="<?= $theNext ? joe_root_relative_link($theNext['permalink']) : 'javascript:;' ?>">
					<p class="muted-2-color">下一篇<i class="fa fa-angle-right em12 ml6"></i><i class="fa fa-angle-right em12"></i></p>
					<div class="text-ellipsis-2"><?= $theNext ? $theNext['title'] : '无更多文章' ?></div>
				</a>
			</div>
		</nav>
	</div>
<?php
}
