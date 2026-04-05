<?php
$options = [];
foreach (['joe_theme_mode', 'JDocumentTitle', 'JCustomFont', 'themeUrl', 'DynamicBackground', 'JWallpaper_Background_PC', 'JWallpaper_Background_WAP', 'JOnLineCountThreshold'] as $value) {
	$options[$value] = $this->options->$value;
}
// $options['JMotto'] = joe_getMotto();
$options['respondId'] = $this->respondId;
$options = json_encode($options, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$highlight_zt = ['dark-theme' => $this->options->joe_article_code_theme_dark, 'white-theme' => $this->options->joe_article_code_theme_light];
?>
<script type="text/javascript">
	window._win = {
		views: '',
		www: '<?= $this->options->siteUrl ?>',
		uri: '<?= rtrim(joe_theme_url('', false), '/') ?>',
		ver: '<?= JOE_VERSION ?>',
		imgbox: '1',
		imgbox_type: 'group',
		imgbox_thumbs: '1',
		imgbox_zoom: '<?= joe_is_mobile() ? '' : '1' ?>',
		imgbox_full: '1',
		imgbox_play: '1',
		imgbox_down: '1',
		sign_type: 'page',
		signin_url: '<?= joe_user_auth_url('login'); ?>',
		signup_url: '<?= joe_user_auth_url('register'); ?>',
		ajax_url: '<?= joe_api_url() ?>/',
		ajaxpager: '',
		ajax_trigger: '<i class="fa fa-angle-right"></i>加载更多',
		ajax_nomore: '没有更多内容了',
		qj_loading: '<?= $this->options->joe_global_loading_animation ?>',
		highlight_kg: '1',
		highlight_hh: '1',
		highlight_btn: '1',
		highlight_zt: '<?= $highlight_zt[joe_theme_mode()] ?? 'enlighter' ?>',
		highlight_white_zt: '<?= $this->options->joe_article_code_theme_light ?? 'enlighter' ?>',
		highlight_dark_zt: '<?= $this->options->joe_article_code_theme_dark ?? 'dracula' ?>',
		upload_img_size: '20',
		img_upload_multiple: '6',
		upload_video_size: '2048',
		upload_file_size: '2048',
		upload_ext: '<?= implode('|', $this->options->allowedAttachmentTypes) ?>',
		user_upload_nonce: 'd20d536c62',
		is_split_upload: '1',
		split_minimum_size: '20',
		comment_upload_img: '',
		options: <?= $options ?>,
	}
	_win.options.commentsAntiSpam = <?= ($this->options->commentsAntiSpam && $this->is('single')) ? trim(Typecho\Common::shuffleScriptVar($this->security->getToken($this->request->getRequestUrl())), ';') : 'null' ?>;
	window.Joe.options = _win.options;
</script>
<script type="text/javascript" src="<?= joe_theme_url('assets/js/function.js') ?>" id="joe-function-js"></script>
<script type="text/javascript" src="<?= joe_theme_url('assets/js/global.js') ?>" id="joe-global-js"></script>
<script type="text/javascript" src="<?= joe_theme_url('assets/js/libs/bootstrap.min.js', []) ?>" id="bootstrap-js"></script>
<script type="text/javascript" src="<?= joe_theme_url('assets/js/loader.js') ?>" id="_loader-js"></script>
<?php if (!empty($this->options->JFestivalLantern)) : ?>
	<script defer src="<?= joe_theme_url('assets/plugin/yihang/china-lantern.min.js', ['text' => $this->options->JFestivalLantern]); ?>"></script>
<?php endif; ?>
<?php if (!empty($this->options->JCursorEffects)) : ?>
	<script defer src="<?= joe_theme_url('assets/plugin/cursor/' . $this->options->JCursorEffects, []) ?>"></script>
<?php endif; ?>
<!-- <script type="text/javascript" src="http://blog.yihang.info/wp-content/themes/zibll/inc/functions/bbs/assets/js/main.min.js?ver=8.6" id="forums-js"></script> -->
<!-- <script type="text/javascript" src="http://blog.yihang.info/wp-content/themes/zibll/inc/functions/shop/assets/js/main.min.js?ver=8.6" id="shop-js"></script> -->
<?php
$runtime = number_format(microtime(true) - JOE_START_TIME, 10, '.', '');
$runtime = number_format((float) $runtime, 2);
$DbLog = think\facade\DbLog::list();
?>
<script type="text/javascript">
	console.log("数据库查询：<?= count($DbLog) ?>次 | 页面生成耗时：<?= $runtime ?>s");
</script>

<!-- 自定义JavaScript -->
<script>
	<?php $this->options->JCustomScript() ?>
</script>
<!-- 自定义JavaScript -->

<script>
	<?php
	$cookie = Typecho\Cookie::getPrefix();
	$notice = $cookie . '__typecho_notice';
	$type = $cookie . '__typecho_notice_type';

	if (isset($_COOKIE[$notice]) && isset($_COOKIE[$type]) && ($_COOKIE[$type] == 'success' || $_COOKIE[$type] == 'notice' || $_COOKIE[$type] == 'error')) { ?>
		alert("<?php echo preg_replace('#\[\"(.*?)\"\]#', '$1', $_COOKIE[$notice]); ?>！");
	<?php }

	Typecho\Cookie::delete('__typecho_notice');
	Typecho\Cookie::delete('__typecho_notice_type');
	?>
	window.addEventListener('load', () => {
		// 计算页面加载时间，并转换为秒
		const loadTime = ((performance.now() - Joe.startTime) / 1000).toFixed(2);
		console.log(`主题 WEB 资源加载耗时：${loadTime}s`);
	});
</script>

<?php Helper::options()->JoeDeBug == 'on' ? $this->need('module/trace.php') : null ?>