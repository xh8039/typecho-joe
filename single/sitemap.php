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

if (!defined('__TYPECHO_ROOT_DIR__')) {http_response_code(404);exit(1);}
$db = Typecho\Db::get();
$options = Widget\Options::alloc();
$limit = Helper::options()->JSiteMap;
$pages = $db->fetchAll(
	$db->select()->from('table.contents')
		->where('table.contents.status = ?', 'publish')
		->where('table.contents.created < ?', $options->gmtTime)
		->where('table.contents.type = ?', 'page')
		->limit($limit)
		->order('table.contents.created', Typecho\Db::SORT_DESC)
);
$articles = $db->fetchAll(
	$db->select()->from('table.contents')
		->where('table.contents.status = ?', 'publish')
		->where('table.contents.created < ?', $options->gmtTime)
		->where('table.contents.type = ?', 'post')
		->limit($limit)
		->order('table.contents.created', Typecho\Db::SORT_DESC)
);
header("Content-Type: application/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($pages as $page) {
	$type = $page['type'];
	$routeExists = (NULL != Typecho\Router::get($type));
	$page['pathinfo'] = $routeExists ? Typecho\Router::url($type, $page) : '#';
	$page['permalink'] = Typecho\Common::url($page['pathinfo'], $options->index);
	echo "\t<url>\n";
	echo "\t\t<loc>" . $page['permalink'] . "</loc>\n";
	echo "\t\t<lastmod>" . date('Y-m-d\TH:i:s\Z', $page['modified']) . "</lastmod>\n";
	echo "\t\t<changefreq>monthly</changefreq>\n";
	echo "\t\t<priority>0.8</priority>\n";
	echo "\t</url>\n";
}
foreach ($articles as $article) {
	$type = $article['type'];
	$article['categories'] = $db->fetchAll($db->select()->from('table.metas')
		->join('table.relationships', 'table.relationships.mid = table.metas.mid')
		->where('table.relationships.cid = ?', $article['cid'])
		->where('table.metas.type = ?', 'category')
		->order('table.metas.order', Typecho\Db::SORT_ASC));
	$article['category'] = urlencode(current(Typecho\Common::arrayFlatten($article['categories'], 'slug')));
	$article['slug'] = urlencode($article['slug']);
	$article['date'] = new Typecho\Date($article['created']);
	$article['year'] = $article['date']->year;
	$article['month'] = $article['date']->month;
	$article['day'] = $article['date']->day;
	$routeExists = (NULL != Typecho\Router::get($type));
	$article['pathinfo'] = $routeExists ? Typecho\Router::url($type, $article) : '#';
	$article['permalink'] = Typecho\Common::url($article['pathinfo'], $options->index);
	echo "\t<url>\n";
	echo "\t\t<loc>" . $article['permalink'] . "</loc>\n";
	echo "\t\t<lastmod>" . date('Y-m-d\TH:i:s\Z', $article['modified']) . "</lastmod>\n";
	echo "\t\t<changefreq>monthly</changefreq>\n";
	echo "\t\t<priority>0.5</priority>\n";
	echo "\t</url>\n";
}
echo "</urlset>";