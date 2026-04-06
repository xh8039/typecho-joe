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
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php') ?>
	<style>
		.author-header .avatar-img .avatar {
			background: var(--main-bg-color);
		}
	</style>
</head>

<body class="wp-singular page-template-default page page-id-2 <?= joe_body_class('page') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="main-min-height">
		<div class="container">
			<?php $this->need('module/user/dashboard/header.php'); ?>
			<div class="fluid-widget"></div>
			<div class="user-center row gutters-10">
				<?php
				$path_info = $this->request->getPathInfo();
				$path_info_explode = explode('/', $path_info);
				$tab_name = empty($path_info_explode[2]) ? $this->request->get('tab', 'index') : $path_info_explode[2];
				require $this->themeDir . 'module/user/dashboard/sidebar.php';
				?>
				<div class="user-center-content col-sm-9 drawer-sm right">
					<div class="tab-content main-tab-content">
						<?php
						require $this->themeDir . 'module/user/content/index.php';
						require $this->themeDir . 'module/user/content/order.php';
						require $this->themeDir . 'module/user/content/reward.php';
						require $this->themeDir . 'module/user/content/profile.php';
						require $this->themeDir . 'module/user/content/account.php';
						require $this->themeDir . 'module/user/content/message.php';
						// $this->need('module/user/content/order.php');
						// $this->need('module/user/content/reward.php');
						// $this->need('module/user/content/profile.php');
						// $this->need('module/user/content/account.php');
						// $this->need('module/user/content/message.php');
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="container fluid-widget"></div>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>