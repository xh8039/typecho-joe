<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<script>
	window.Joe = {};
	Joe.startTime = performance.now();
	Joe.IS_MOBILE = /windows phone|iphone|android/gi.test(window.navigator.userAgent);
</script>

<!-- 自定义CSS -->
<style>
	<?php $this->options->JCustomCSS() ?>
</style>
<!-- 自定义CSS -->

<?php
$theme_color = empty($this->options->joe_theme_color_custom) ? $this->options->joe_theme_color : $this->options->joe_theme_color_custom;
$theme_color = empty($theme_color) ? '268df7' : $theme_color;
$theme_color_rgb = implode(',', joe_hex_to_rgb($theme_color));
?>
<style>
	html {
		color-scheme: <?= joe_theme_mode() == 'dark-theme' ? 'dark' : 'light' ?>;
	}

	body {
		--theme-color: #<?= $theme_color ?>;
		--focus-shadow-color: rgba(<?= $theme_color_rgb ?>, .4);
		--focus-color-opacity1: rgba(<?= $theme_color_rgb ?>, .1);
		--focus-color-opacity05: rgba(<?= $theme_color_rgb ?>, .05);
		--focus-color-opacity3: rgba(<?= $theme_color_rgb ?>, .3);
		--focus-color-opacity6: rgba(<?= $theme_color_rgb ?>, .6);
		--mian-max-width: <?= $this->options->joe_layout_max_width ?? '1200px' ?>;
		-webkit-overflow-scrolling: touch;
	}

	.enlighter-default .enlighter,
	.wp-block-zibllblock-enlighter:not(:has(.enlighter)),
	.enlighter-pre:not(:has(.enlighter)) {
		max-height: 400px;
		overflow-y: auto !important;
	}

	<?php
	if ($this->options->joe_article_list_title_bold == 'on') {
		echo '.posts-item .item-heading>a {font-weight: bold;color: unset;}';
	}
	if ($this->options->joe_article_content_indent == 'on') {
		echo '.article-content p {text-indent: 30px;}';
	}
	if ($this->options->JLogo_Light_Effect == 'on') {
		echo '.navbar-logo {overflow: hidden;position: relative;}.navbar-logo::before {content: "";position: absolute;inset: -50%;background: linear-gradient(45deg, rgba(255, 255, 255, 0) 40%, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0) 60%);animation: JoeScanLight 2s infinite;transform: translateX(-30%);z-index: 10;}@keyframes JoeScanLight {to {transform: translateX(30%);}}';
	} 
	if (joe_is_pc() && $this->options->JWallpaper_Background_PC) {
		echo 'body {background-image: url("' . $this->options->JWallpaper_Background_PC . '");background-repeat: no-repeat;background-size: 100%;background-attachment: fixed;}';
	}
	if (joe_is_mobile() && $this->options->JWallpaper_Background_WAP) {
		echo 'body {background-image: url("' . $this->options->JWallpaper_Background_WAP . '");background-repeat: no-repeat;background-size: 100%;background-attachment: fixed;}';
	}
	?>
	/* body {
		background-image: url("https://pic.netbian.com/uploads/allimg/260312/195529-1773316529410c.jpg");
		background-position: center top;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100%;
	}

	.dark-theme {
		background-image: url("https://pic.netbian.com/uploads/allimg/260225/235144-17720347045bde.jpg");
		background-position: center top;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100%;
	} */

	@media (max-width: 640px) {
		.meta-right .meta-view {
			display: unset !important;
		}
	}
</style>