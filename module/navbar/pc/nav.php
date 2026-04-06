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
?><ul class="nav navbar-nav">
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