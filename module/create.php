<?php

/**
 * 发布文章
 *
 * @package custom
 *
 **/
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="wp-singular page-template page-template-pages page-template-newposts page-template-pagesnewposts-php page page-id-8 <?= $this->user->hasLogin() ? 'logged-in' : '' ?> wp-theme-zibll white-theme logged-admin nav-fixed site-layout-<?= in_array('post', $this->options->joe_sidebar) ? '2' : '1' ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container">
		<form>
			<div class="content-wrap newposts-wrap">
				<div class="content-layout">
					<div class="zib-widget full-widget-sm editor-main-box" style="min-height:60vh;">
						<div class="mb20 featured-edit" featured-args='{"options":{"video_ratio":50,"slide_ratio":50,"image_ratio":50,"video":true,"slide":true}}'>
							<div class="btns-full flex jc"></div>
						</div>
						<div class="relative newposts-title">
							<textarea type="text" class="line-form-input input-lg new-title" name="post_title" tabindex="1" rows="1" autoHeight="true" maxHeight="78" placeholder="请输入标题"></textarea>
							<i class="line-form-line"></i>
						</div>
						<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
							<link rel='stylesheet' id='dashicons-css' href='<?= joe_theme_url('assets/css/dashicons.min.css') ?>' type='text/css' media='all' />
							<link rel='stylesheet' id='editor-buttons-css' href='<?= joe_theme_url('assets/css/editor.min.css') ?>' type='text/css' media='all' />
							<link rel="stylesheet" href="<?= joe_theme_url('assets/css/new-posts.min.css') ?>" type="text/css">
							<div id="wp-post_content-editor-container" class="wp-editor-container">
								<textarea class="wp-editor-area" style="height: 470px" autocomplete="off" cols="40" name="post_content" id="post_content"></textarea>
							</div>
						</div>
						<div class="em09 flex ac hh">
							<span class="view-btn mr6 mt6"></span>
							<span class="modified-time mt6"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="sidebar show-sidebar">
				<div class="zib-widget mb10-sm">
					<div class="title-theme mb10">文章参数</div>
					<div class="term-select-box">
						<div class="newpost-cat-drop drop-select dropdown dependency-box">
							<div data-toggle-class="open" data-target=".newpost-cat-drop" class="flex ac jsb drop-btn form-control mb6">
								<div class="title-theme222">
									<i class="fa fa-fw fa-folder-open-o mr6" aria-hidden="true"></i>
									分类
								</div>
								<i class="ml6 fa fa-angle-right em12"></i>
							</div>
							<div class="dropdown-menu fluid" style="margin-bottom: -4px;">
								<div class="mini-scrollbar padding-w10 select-drop-box">
									<div>
										<label class="muted-color font-normal pointer">
											<input value="4" type="checkbox" name="category[]">
											<span class="ml6">技术教程</span>
										</label>
									</div>
									<div>
										<label class="muted-color font-normal pointer">
											<input value="6" type="checkbox" name="category[]">
											<span class="ml6">文创娱乐</span>
										</label>
									</div>
									<div>
										<label class="muted-color font-normal pointer">
											<input value="1" type="checkbox" name="category[]">
											<span class="ml6">未分类</span>
										</label>
									</div>
									<div>
										<label class="muted-color font-normal pointer">
											<input value="3" type="checkbox" name="category[]">
											<span class="ml6">源码资源</span>
										</label>
									</div>
									<div>
										<label class="muted-color font-normal pointer">
											<input value="5" type="checkbox" name="category[]">
											<span class="ml6">程序软件</span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="title-theme mb10 mt20">标签</div>
					<p class="muted-3-color em09">填写文章的标签，每个标签用逗号隔开</p>
					<textarea class="form-control" rows="3" name="tags" placeholder="输入文章标签" tabindex="6"></textarea>
				</div>
				<div class="zib-widget dependency-box mb10-sm">
					<div class="title-theme mb10">付费内容</div>
					<div>
						<div class="flex ac jsb padding-h10 border-bottom">
							<div class="flex ac">内容付费</div>
							<label style="margin: 0;">
								<input class="hide" name="zibpay_s" type="checkbox">
								<div class="form-switch flex0"></div>
							</label>
						</div>
						<div data-controller="zibpay_s" data-condition="!=" data-value="" style="display: none;">
							<input type="hidden" name="posts_zibpay[pay_modo]" value="0">
							<div class="mt10" data-controller="posts_zibpay[pay_modo]" data-condition="!=" data-value="points">
								<div class="relative">
									<div class="flex ab">
										<div class="muted-color mb6 flex0">
											<svg class="mr6 em12" aria-hidden="true">
												<use xlink:href="#icon-money-color-2"></use>
											</svg>
											设置价格
										</div>
										<input limit-max="99999" warning-max="最高可设置：1$" type="number" name="posts_zibpay[pay_price]" value="" style="padding: 0;" class="line-form-input em2x key-color text-right">
										<i class="line-form-line"></i>
									</div>
								</div>
							</div>
							<div class="mt10 pay-dawnload-edit">
								<div class="flex ac jsb padding-h10">
									<b class="">付费下载</b>
									<div class="">
										<botton type="button" class="pay-dawnload-add but hollow p2-10 px12 c-blue">
											<svg class="icon" aria-hidden="true">
												<use xlink:href="#icon-add"></use>
											</svg>
											添加资源
										</botton>
									</div>
								</div>
								<div class="mt10 px12 lists-box"></div>
							</div>
							<div class="em09 mt10 muted-2-color">请确保已经在文中添加了付费可见的隐藏内容或已添加付费下载内容</div>
						</div>
						<div class="em09 mt10 muted-2-color" data-controller="zibpay_s" data-condition="==" data-value="">如果您在文章中添加了付费可见的隐藏内容或需要设置付费下载资源，请在此设置付费功能</div>
						<div data-controller="zibpay_s" data-condition="!=" data-value="" style="display: none;"></div>
					</div>
				</div>
				<div class="zib-widget">
					<div class="text-center">
						<p class="separator muted-3-color theme-box">Are you ready</p>
						<input type="hidden" name="posts_id" value="0">
						<div class="but-average  ">
							<botton type="button" action="posts_draft" name="submit" class="but jb-green new-posts-submit padding-lg">
								<i class="fa fa-fw fa-dot-circle-o"></i>
								保存草稿
							</botton>
							<botton type="button" action="posts_save" name="submit" class="ml10 but jb-blue new-posts-submit padding-lg">
								<i class="fa fa-fw fa-check-square-o"></i>
								提交发布
							</botton>
						</div>
					</div>
				</div>
			</div>
		</form>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>