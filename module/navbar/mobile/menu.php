<ul class="mobile-menus theme-box">
	<?php
	$custom_navs = joe_custom_navs(false);
	$path_info = $this->request->getPathInfo();
	foreach ($custom_navs as $nav) {
		$current = $path_info === $nav['url'] ? 'current-menu-item current_page_item' : '';
	?>
		<li class="<?= $current ?> menu-item menu-item-type-custom menu-item-object-custom <?= empty($nav['list']) ? '' : 'menu-item-has-children' ?> menu-item-9">
			<a rel="<?= $nav['rel'] ?>" href="<?= $nav['url'] ?>" aria-current="page"><?= $nav['title'] ?></a>
			<?php
			if (!empty($nav['list'])) {
				echo '<ul class="sub-menu">';
				foreach ($nav['list'] as $value) {
					$current = $path_info === $value['url'] ? 'current-menu-item current_page_item' : '';
				?>
				<li class="<?= $current ?> menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12"><a rel="<?= $value['rel'] ?>" href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
				<?php
				}
				echo '</ul>';
			}
			?>
		</li>
	<?php
	}
	?>
</ul>