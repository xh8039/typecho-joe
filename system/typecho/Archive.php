<?php

namespace joe\typecho;

use Typecho\Db;
use Typecho\Cookie;

class Archive
{
	private static function order($archive, $select)
	{
		$select->cleanAttribute('fields');
		$orderby = $archive->request->get('orderby', 'created');
		if ($orderby == 'created') $select->order('table.contents.created', Db::SORT_DESC);
		if ($orderby == 'modified') $select->order('table.contents.modified', Db::SORT_DESC);
		if ($orderby == 'views') $select->order('table.contents.views', Db::SORT_DESC);
		if ($orderby == 'like') $select->order('table.contents.agree', Db::SORT_DESC);
		if ($orderby == 'comment_count') $select->order('table.contents.commentsNum', Db::SORT_DESC);
		$archive->setCountSql(clone $select);
	}
	private static function meta()
	{
		// $categorySelect = $this->db->select()->from('table.metas')->where('mid = ?', $this->parameter->mid)->limit(1);
		// $category = MetasFrom::allocWithAlias('metas:' . $this->parameter->mid, ['query' => $categorySelect]);
		// $children = $category->getAllChildIds($category->mid);
		// $children[] = $category->mid;
		// $select->join('table.relationships', 'table.contents.cid = table.relationships.cid')
		// ->where('table.relationships.mid IN ?', $children)
		// ->where('table.contents.type = ?', 'post')
		// ->group('table.contents.cid');
	}
	public static function index($archive, $select)
	{
		$options =  \Widget\Options::alloc();
		$stickyIds = empty($options->JIndexSticky) ? [0] : explode("||", $options->JIndexSticky);

		$select->where('table.contents.cid NOT IN ?', $stickyIds);

		self::order($archive, $select);
	}
	public static function category($archive, $select)
	{
		self::order($archive, $select);
	}
	public static function tag($archive, $select) {
		self::order($archive, $select);
	}
	public static function search($archive, $select) {
		
		// echo($select);
		// exit;
		// $keywords = $archive->request->filter('url', 'search')->get('keywords');
		// $searchQuery = '%' . str_replace(' ', '%', $keywords) . '%';

		// 	/** 搜索无法进入隐私项保护归档 */
		// 	if (joe_user_alloc()->hasLogin()) {
		// 		//~ fix issue 941
		// 		$select->where("table.contents.password IS NULL
		// 		 OR table.contents.password = '' OR table.contents.authorId = ?", joe_user_alloc()->uid);
		// 	} else {
		// 		$select->where("table.contents.password IS NULL OR table.contents.password = ''");
		// 	}

		// 	$op = Db::get()->getAdapter()->getDriver() == 'pgsql' ? 'ILIKE' : 'LIKE';

		// 	$select->where("table.contents.title {$op} ? OR table.contents.text {$op} ?", $searchQuery, $searchQuery)
		// 		->where('table.contents.type = ?', 'post');
		self::order($archive, $select);
		$select->page($archive->getCurrentPage(), $archive->parameter->pageSize);
		$archive->query($select);
		/** 处理超出分页的情况 */
		if ($archive->getCurrentPage() > 1 && !$archive->have()) {
			throw new \Typecho\Widget\Exception(_t('请求的地址不存在'), 404);
		}
	}
	public static function author($archive, $select) {
		self::order($archive, $select);
	}
}
