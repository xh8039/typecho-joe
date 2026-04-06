<div win-ajax-replace="page-cover" class="page-cover zib-widget">
	<img class="lazyload fit-cover" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" data-src="<?= $this->pageRow->image ?: $this->options->joe_category_default_cover ?>">
		<div class="absolute linear-mask"></div>
			<div class="list-inline box-body page-cover-con">
				<div class="title-h-left"><b><i class="fa fa-folder-open em12 mr10 ml6" aria-hidden="true"></i><?= $this->archiveTitle ?><span class="icon-spot">共<?= $this->getTotal(); ?>篇</span></b></div>
				<?php
				if ($this->user->group === 'administrator') {
					$description = empty($this->archiveDescription) ? '请在Typecho后台-管理-分类中添加分类描述！' : $this->archiveDescription;
					?><div class="em09 page-desc"><?= $description ?>&nbsp;<span class="admin-edit" data-toggle="tooltip" title="编辑此分类"><a href="<?= $this->options->adminUrl . 'category.php?mid=' . $this->pageRow->mid ?>">[编辑]</a></span></div><?php
				} else if (!empty($this->archiveDescription)) {
					?>
					<div class="em09 page-desc"><?= $this->archiveDescription ?></div>
					<?php
				}
				?>
			</div>
			<?php
			if ($this->user->group === 'administrator') {
			?><div class="abs-center right-bottom padding-6 cover-btns"><span class="dropup pull-right"><a href="javascript:;" class="item mr3 toggle-radius" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a><ul class="dropdown-menu"><li><a mobile-bottom="true" data-height="330" data-remote="<?= joe_api_url('page_cover_set_modal',['archive'=>'category','mid'=>$this->pageRow->mid]) ?>" class="avatar-set-link " href="javascript:;" data-toggle="RefreshModal"><i class="fa fa-camera mr6" aria-hidden="true"></i>修改封面</a></li></ul></span></div><?php
			}
			?>
</div>