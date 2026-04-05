<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php
	$this->setArchiveTitle('登录注册');
	$this->need('module/head.php');
	?>
	<style>
		.page-template-user-sign {
			min-height: 500px;
		}

		.sign-page {
			min-height: 500px;
			padding-top: 70px;
		}

		.sign-row {
			height: 100%;
		}

		.sign-page .sign {
			width: 350px;
		}

		.sign-col {
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.sign-col [data-dismiss="modal"] {
			display: none;
		}

		.oauth-data-box .avatar-img {
			--this-size: 60px;
		}
	</style>
</head>

<body class="wp-singular page-template page-template-pages page-template-user-sign page-template-pagesuser-sign-php page page-id-6 <?= joe_body_class('user-sign') ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container sign-page absolute">
		<div class="row sign-row gutters-5">
			<div class="col-md-6 col-md-offset-3 sign-col">
				<!-- <div style="padding:20px 0 60px 0"> -->
					<div style="padding:0px 0 60px 0">
					<div class="sign zib-widget blur-bg relative">
						<!-- <div class="text-center"><div class="sign-logo box-body"><a href="<?= $this->options->siteUrl ?>"><img src="<?= joe_theme_url('assets/img/thumbnail-sm.svg', false) ?>" data-src="<?= joe_logo_url('light') ?>" switch-src="<?= joe_logo_url('dark') ?>" alt="<?= $this->options->title ?>" class="lazyload"></a></div></div> -->
						<div class="tab-content">
							<?php
							$tab = $this->request->get('tab','login');
							?>
							<div class="tab-pane fade <?= $tab === 'login' ? 'active in' : '' ?>" id="tab-sign-in">
								<?php $this->need('module/user/login.php') ?>
							</div>
							<div class="tab-pane fade <?= $tab === 'register' ? 'active in' : '' ?>" id="tab-sign-up">
								<?php $this->need('module/user/register.php') ?>
							</div>
							<div class="tab-pane fade <?= $tab === 'resetpassword' ? 'active in' : '' ?>" id="tab-resetpassword">
								<?php $this->need('module/user/reset.php') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="notyn"></div>
	<div class="text-center blur-bg fixed px12 opacity8" style="top: auto; height: auto;padding:10px;padding-bottom:max(10px, env(safe-area-inset-bottom, 0));"><?= $this->options->joe_user_sign_page_footer ?></div>
	<?php $this->need('module/js.php'); ?>
</body>

</html>