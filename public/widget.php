<?php

use think\facade\Db;

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

class Widget_Contents_Hot extends Widget\Base\Contents
{
	public function execute()
	{
		// 排除推荐文章
		$recommend_text = joe_is_mobile() ? Helper::options()->JIndex_Mobile_Recommend : Helper::options()->JIndex_Recommend;
		$recommend = joe_optionMulti($recommend_text, '||', null);
		// 排除置顶文章
		$JIndexSticky = joe_optionMulti(Helper::options()->JIndexSticky, '||', null);
		// 排除要隐藏的热门文章
		$IndexHotHidePost = joe_optionMulti(Helper::options()->IndexHotHidePost, '||', null);
		// 合并排除文章
		$hide_contents_cid_list = array_unique(array_merge($recommend, $JIndexSticky, $IndexHotHidePost));
		// 默认文章一页展示多少个
		$this->parameter->setDefault(['pageSize' => 10]);

		$SQL = Db::name('contents');
		if (!empty($hide_contents_cid_list)) $SQL->whereNotIn('cid', $hide_contents_cid_list);
		$SQL->where(function ($SQL) {
			$SQL->whereNull('password')->whereOr('password', '');
		})->where('status', 'publish')
			->where('created', '<=', time())
			->where('type', 'post')
			->limit($this->parameter->pageSize);

		if (in_array($this->parameter->action, ['index', 'search']) && is_numeric(Helper::options()->JIndexHotArticleView)) {
			$SQL->where('views', '>=', Helper::options()->JIndexHotArticleView);
			$SQL->orderRaw('RAND()');
			// 显式转换为字符串并构建子查询
			$subQuery = $SQL->buildSql();
			$SQL = Db::table($subQuery . ' AS randomized')->order('views', 'desc');
		} else {
			$SQL->order('views', 'desc');
		}
		$subQuery = $SQL->buildSql();
		return $SQL->select()->map([$this, 'push']);


		$select = $this->select('*');
		$select->cleanAttribute('fields');
		$SQL = $select->from('table.contents');
		if (!empty($hide_contents_cid_list)) $SQL->where('cid NOT' . "\r\n" . 'IN?', $hide_contents_cid_list);
		$SQL->where("password IS NULL OR password = ''")
			->where('status = ?', 'publish')
			->where('created <= ?', time())
			->where('type = ?', 'post')
			->limit($this->parameter->pageSize);
		if (in_array($this->parameter->action, ['index', 'search']) && is_numeric(Helper::options()->JIndexHotArticleView)) {
			$SQL->where('views >= ?', Helper::options()->JIndexHotArticleView);
			$SQL->order('RAND()', '');
			// 显式转换为字符串并构建子查询
			$subQuery = $SQL->prepare($SQL);
			$subQuery = str_replace("\r\n", ' ', $subQuery);
			$SQL = $this->select('*')->from('(' . $subQuery . ') AS randomized')->order('views', Typecho\Db::SORT_DESC);
		} else {
			$SQL->order('views', Typecho\Db::SORT_DESC);
		}
		$this->db->fetchAll($SQL, [$this, 'push']);
	}
}

class Widget_Contents_Sort extends Widget_Abstract_Contents
{
	public function execute()
	{
		$this->parameter->setDefault(array('page' => 1, 'pageSize' => 10, 'type' => 'created'));
		$offset = $this->parameter->pageSize * ($this->parameter->page - 1);
		$select = $this->select();
		$select->cleanAttribute('fields');
		$hide_categorize_slug = array_map('trim', explode("||", Helper::options()->JIndex_Hide_Categorize ?? ''));
		if (!empty($hide_categorize_slug)) {
			$categorize_sql = $this->db->select('mid', 'slug')->from('table.metas')->where('table.metas.type = ?', 'category');
			$hide_categorize_id = $this->db->fetchAll($categorize_sql);
			if (is_array($hide_categorize_id) && !empty($hide_categorize_id)) {
				$hide_categorize_list = [];
				foreach ($hide_categorize_id as $key => $value) {
					$hide_categorize_list[$value['mid']] = $value['slug'];
				}
				$hide_categorize_list = array_diff($hide_categorize_list, $hide_categorize_slug);
				$hide_categorize_list = array_values(array_flip($hide_categorize_list));
				$select->join('table.relationships', 'table.contents.cid = table.relationships.cid')
					->where('table.relationships.mid IN ?', $hide_categorize_list)
					->group('table.contents.cid');
			}
		}
		$select->from('table.contents')->where('table.contents.type = ?', 'post')
			->where('table.contents.status = ?', 'publish')
			->where('table.contents.created < ?', time())
			->limit($this->parameter->pageSize)
			->offset($offset)
			->order($this->parameter->type, Typecho\Db::SORT_DESC);
		$this->db->fetchAll($select, array($this, 'push'));
	}
}

class Widget_Contents_Post extends Widget_Abstract_Contents
{
	public function execute()
	{
		$select = $this->select();
		$select->cleanAttribute('fields');
		$this->db->fetchAll(
			$select
				->from('table.contents')
				->where('table.contents.type = ?', 'post')
				->where('table.contents.cid = ?', $this->parameter->cid)
				->limit(1),
			array($this, 'push')
		);
	}
}

class Widget_Contents_Post_Author extends Widget_Abstract_Contents
{
	public function execute()
	{
		$select = $this->select();
		$select->cleanAttribute('fields');
		$this->db->fetchAll($select
			->from('table.contents')
			->where('table.contents.type = ?', 'post')
			->where('table.contents.cid <> ?', $this->parameter->cid)
			->where('table.contents.authorId = ?', $this->parameter->authorId)
			->where('table.contents.status = ?', 'publish')
			->order('table.contents.created', Typecho\Db::SORT_DESC)
			->limit($this->parameter->limit), [$this, 'push']);
	}
}
