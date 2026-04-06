<div class="ajaxpager tab-pane fade <?= $tab_name == 'index' ? 'in active' : '' ?>" id="user-tab-index">
	<?php
	if ($tab_name == 'index') {
	?>
		<div class="ajax-item">
			<div class="zib-widget">
				<div class="box-body nopw-sm">首页</div>
			</div>
		</div>
		<div class="ajax-pag hide">
			<div class="next-page ajax-next">
				<a href="#"></a>
			</div>
		</div>
	<?php
	} else {
	?>
		<span class="post_ajax_trigger hide">
			<a href="<?= joe_build_url('user/index') ?>" class="ajax_load ajax-next ajax-open"></a>
		</span>
	<?php
	}
	?>
	<div class="post_ajax_loader" style="display: none;">
		<div class="zib-widget">
			<div class="box-body notop nopw-sm">
				<div class="border-bottom box-body">
					<div style="width: 150px;" class="placeholder t1 mb10"></div>
					<div class="placeholder t1"></div>
				</div>
				<div class="border-bottom box-body">
					<div style="width: 150px;" class="placeholder t1 mb10"></div>
					<div class="placeholder t1"></div>
				</div>
				<div class="border-bottom box-body">
					<div style="width: 150px;" class="placeholder t1 mb10"></div>
					<div class="placeholder t1"></div>
				</div>
				<div class="box-body nobottom">
					<div style="width: 150px;" class="placeholder t1"></div>
				</div>
			</div>
		</div>
	</div>
</div>