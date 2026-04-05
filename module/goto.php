<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php
	$this->setArchiveTitle('即将跳转到外部网站');
	$this->need('module/head.php');
	?>
	<style>
		.article.page-article {
			padding: 2.4rem;
			margin-top: 100px;
			margin-bottom: 130px;
			margin-left: auto;
			margin-right: auto;
		}
		.wp-posts-content p {
			line-height: 2.2rem;
			margin-bottom: 2.4rem;
		}
	</style>
</head>

<body class="wp-singular page-template-default page page-id-2 <?= joe_body_class('page') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="container page-id-2">
		<div class="content-wrap">
			<div class="content-layout">
				<article style="max-width: 540px;" class="article page-article main-bg theme-box box-body radius8 main-shadow">
					<div class="wp-posts-content">
						<h2 style="margin-top: 0;margin-bottom: 1.2rem;">即将跳转到外部网站</h2>
						<p class='content-text'>您将要访问的链接不属于 <?= $this->options->title ?> ，请关注您的账号安全。</p>
						<p><a><span class='external-link-href'></span></a></p>
						<div style="text-align: right;"><button  class="but pw-1em jb-blue external-link-btn">继续前往</button></div>
					</div>
				</article>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<script>
		window.is_black = false;
		(function() {
			var e = document.querySelector(".external-link-href");
			var t = window.atob(new URLSearchParams(location.search).get("url"));
			// var t = '<?= base64_decode($this->request->url) ?>';
			if (t && (e.innerText = t, !window.is_black)) {
				var n = document.querySelector(".external-link-btn");
				n && n.addEventListener("click", function() {
					window.location.href = t
				})
			}
		}());
	</script>
	<?php $this->need('module/footer.php') ?>
</body>

</html>