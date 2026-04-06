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

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="single-head-cover">
	<div class="graphic mb20 single-cover imgbox-container">
		<img referrerpolicy="no-referrer" rel="noreferrer" class="fit-cover lazyload" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" data-src="<?= $this->fields->cover ?: joe_article_thumbnail_url($this)[0] ?>" alt="<?= $this->title ?>">
		<div class="abs-center left-bottom single-cover-con">
			<h1 class="article-title title-h-left"><?= $this->title ?></h1>
			<ul class="breadcrumb"><li><a href="/"><i class="fa fa-map-marker"></i>首页</a></li><?php foreach ($this->categories as $key => $categorie) echo '<li><a href="' . $categorie['permalink'] . '">' . $categorie['name'] . '</a></li>'; ?><li>正文</li></ul>
		</div>
		<div class="flex ac single-metabox cover-meta abs-right">
			<div class="post-metas">
				<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
				<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
			</div>
			<?php
			if ($this->authorId == $this->user->uid || in_array($this->user->group, ['editor', 'administrator'])) {
			?>
				<div class="clearfix ml6">
					<div class="dropdown more-dropup pull-right">
						<a href="javascript:;" class="but cir post-drop-meta" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a>
						<ul class="dropdown-menu">
							<li><a target="_blank" rel="nofollow" href="<?= joe_relative_url($this->options->adminUrl) ?>write-post.php?cid=<?= $this->cid ?>" class=""><i class="fa fa-fw fa-edit mr6"></i>编辑文章</a></li>
							<li><a data-class="modal-mini" mobile-bottom="true" data-height="240" data-remote="<?= joe_api_url('post_delete_modal',['id'=>$this->cid]) ?>" class="c-red" href="javascript:;" data-toggle="RefreshModal"><i class="fa fa-trash-o mr6 fa-fw"></i>删除文章</a></li>
						</ul>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>