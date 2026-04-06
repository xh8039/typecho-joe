<div class="modal-colorful-header colorful-bg jb-blue">
	<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
	<div class="colorful-make"></div>
	<div class="text-center">
		<div class="em2x"><i class="fa fa-folder-open" aria-hidden="true"></i></div>
		<div class="mt10 em12 padding-w10">修改分类封面</div>
	</div>
</div>
<form>
	<div class="relative line-form mb10">
		<input type="url" name="cover" class="line-form-input" tabindex="1" placeholder="">
		<i class="line-form-line"></i>
		<div class="scale-placeholder">封面图URL</div>
	</div>
	<p class="muted-2-color mb20">选择一张深色图片作为分类封面，支持jpg、gif格式，最大20M，建议尺寸2000x800</p>
	<!-- <div class="box-body">
		<input type="hidden" name="action" value="user_signin">
		<button type="button" class="but radius jb-blue padding-lg signsubmit-loader btn-block"><i class="fa fa-sign-in mr10"></i>登录</button>
	</div> -->
	<div class="modal-buts but-average"><button type="button" form-action="page_cover_set" zibajax="submit" class="but c-blue" name="submit"><i class="fa fa-check mr10"></i>确认修改</button></div>
	<input type="hidden" name="mid" value="<?= $mid ?>">
	<!-- <input type="hidden" name="archive" value="<?= $archive ?>"> -->
</form>
<!-- <form class="mini-upload">
	<div class="form-upload mb20">
		<p class="muted-2-color">选择一张深色图片作为分类封面，支持jpg、gif格式，最大20M，建议尺寸2000x800</p>
		<label class="pointer" style="width: 100%;">
			<div class="cover-preview radius8 relative">
				<div class="preview-container preview abs-center">
					<img class="fit-cover" src="<?= joe_theme_url('assets/img/upload-add.svg') ?>">
				</div>
			</div>
			<input class="hide" type="file" zibupload="image_upload" accept="image/gif,image/jpeg,image/jpg" name="image_upload" action="image_upload">
		</label>
	</div>
	<div class="modal-buts but-average"><button type="button" action="info.upload" zibupload="submit" class="but c-blue" name="submit"><i class="fa fa-check mr10"></i>确认修改</button></div>
	<input type="hidden" id="upload_cover_nonce" name="upload_cover_nonce" value="00f30cb02e"/>
	<input type="hidden" name="user_id" value="1">
	<input type="hidden" name="action" value="user_upload_cover">
</form> -->
