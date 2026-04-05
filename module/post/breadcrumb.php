<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<ul class="breadcrumb"><li><a href="/"><i class="fa fa-map-marker"></i> 首页</a></li><?php if (sizeof($this->categories) > 0) : ?><li><a href="<?= joe_root_relative_link($this->categories[0]['permalink']); ?>"><?= $this->categories[0]['name']; ?></a></li><?php endif; ?><li>正文</li></ul>