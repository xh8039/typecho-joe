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

?>
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