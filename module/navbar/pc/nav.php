<ul class="nav navbar-nav">
	<?php
	$custom_navs = joe_custom_navs();
	$path_info = $this->request->getPathInfo();
	foreach ($custom_navs as $nav) {
		$title = empty($nav['list']) ? $nav['title'] : $nav['title'] . '<i class="fa fa-angle-down ml6"></i>';
		$current = $path_info === $nav['url'] ? 'current-menu-item current_page_item' : '';
		echo '<li class="menu-item ' . $current . '">';
		echo '<a rel="' . $nav['rel'] . '" href="' . $nav['url'] . '" target="' . $nav['target'] . '">' . $title . '</a>';
		if (!empty($nav['list'])) {
			echo '<ul class="sub-menu">';
			foreach ($nav['list'] as $value) {
				$current = $path_info === $value['url'] ? 'current-menu-item current_page_item' : '';
	?>
				<li class="menu-item <?= $current ?>">
					<a rel="<?= $value['rel'] ?>" href="<?= $value['url'] ?>" target="<?= $value['target'] ?>"><?= $value['title'] ?></a>
				</li>
	<?php
			}
			echo '</ul>';
		}
		echo '</li>';
	}
	?>
</ul>