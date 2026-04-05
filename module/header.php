<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
$this->need('module/loading/animation.php');
?>
<header class="header header-layout-1">
	<nav class="navbar navbar-top center">
		<div class="container-fluid container-header">
			<?php $this->need('module/navbar/pc/header.php') ?>
			<div class="collapse navbar-collapse">
				<?php
				$this->need('module/navbar/pc/nav.php');
				$this->need('module/navbar/pc/form.php');
				?>
			</div>
		</div>
	</nav>
</header>
<?php
if (!$this->is('search')) $this->need('module/navbar/search/container.php');
$this->need('module/header/mobile-header.php');
?>