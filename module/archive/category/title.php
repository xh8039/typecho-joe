<div class="zib-widget">
    <h4 class="title-h-left"><i class="fa fa-folder-open em12 mr10 ml6" aria-hidden="true"></i><?= $this->archiveTitle ?><span class="icon-spot">共<?= $this->getTotal(); ?>篇</span></h4>
    <?php
    if ($this->user->group === 'administrator') {
        $description = empty($this->archiveDescription) ? '请在Typecho后台-管理-分类中添加分类描述！' : $this->archiveDescription;
    ?>
        <div class="muted-2-color"><?= $description ?>&nbsp;<span class="admin-edit" data-toggle="tooltip" title="编辑此分类"><a target="_blank" href="<?= $this->options->adminUrl . 'category.php?mid=' . $this->pageRow->mid ?>">[编辑]</a></span></div>
    <?php
    } else if (!empty($this->archiveDescription)) {
    ?>
        <div class="muted-2-color"><?= $this->archiveDescription ?></div>
    <?php
    }
    ?>
</div>