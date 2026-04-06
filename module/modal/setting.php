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
<div class="modal fade" id="modal_admin_set" tabindex="-1" role="dialog" aria-hidden="false" win-ajax-replace="modal_admin_set">
	<div class="modal-dialog" role="document">
		<div class="modal-content page-set-modal">
			<form>
				<div class="modal-header">
					<strong class="modal-title"><i class="fa fa-sliders mr10" aria-hidden="true"></i>文章设置</strong>
					<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
				</div>
				<div class="modal-body">
					<div class="mb10 row  option-radio">
						<div class="heading col-xs-3 text-right">显示布局</div>
						<div class="option col-xs-8">
							<label class="mr10"><input type="radio" checked="true" name="show_layout" value="" /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">跟随主题</span></label>
							<label class="mr10"><input type="radio" name="show_layout" value="no_sidebar" /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">无侧边栏</span></label>
							<label class="mr10"><input type="radio" name="show_layout" value="sidebar_left" /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">侧边栏靠左</span></label>
							<label class="mr10"><input type="radio" name="show_layout" value="sidebar_right" /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">侧边栏靠右</span></label>
						</div>
					</div>
					<div class="mb10 row  option-text">
						<div class="heading col-xs-3 text-right">标题</div>
						<div class="option col-xs-8"><input class="form-control" name="post_title" type="text" value="<?= $this->title ?>" /></div>
					</div>
					<!-- <div class="mb10 row  option-text">
						<div class="heading col-xs-3 text-right">副标题</div>
						<div class="option col-xs-8"><input class="form-control" name="subtitle" type="text" value="" /></div>
					</div> -->
					<!-- <div class="mb10 row  option-select">
						<div class="heading col-xs-3 text-right">文章格式</div>
						<div class="option col-xs-8">
							<div class="form-select">
								<select class="form-control" name="post_format">
									<option value="standard">标准</option>
									<option value="image">图像</option>
									<option value="gallery">画廊</option>
									<option value="video">视频</option>
								</select>
							</div>
						</div>
					</div> -->
					<div class="mb10 row  option-number">
						<div class="heading col-xs-3 text-right">点赞数</div>
						<div class="option col-xs-8"><input class="form-control" name="like" type="number" value="<?= $this->agree ?>" /></div>
					</div>
					<div class="mb10 row  option-number">
						<div class="heading col-xs-3 text-right">阅读数</div>
						<div class="option col-xs-8"><input class="form-control" name="views" type="number" value="<?= $this->views ?>" /></div>
					</div>
					<div class="mb10 row  option-checkbox">
						<div class="heading col-xs-3 text-right">目录树</div>
						<div class="option col-xs-8">
							<span class="form-checkbox"><input $value="" name="no_article-navs" id="no_article-navs" type="checkbox" /><label for="no_article-navs" class="em09 muted-color ml6" style=" font-weight: normal; ">不显示</label></span>
						</div>
					</div>
					<div class="mb10 row  option-checkbox">
						<div class="heading col-xs-3 text-right">文章高度</div>
						<div class="option col-xs-8">
							<span class="form-checkbox"><input $value="" name="article_maxheight_xz" id="article_maxheight_xz" type="checkbox" /><label for="article_maxheight_xz" class="em09 muted-color ml6" style=" font-weight: normal; ">限制文章最大高度</label></span>
						</div>
					</div>
					<div class="mb10 row  option-radio">
						<div class="heading col-xs-3 text-right">评论</div>
						<div class="option col-xs-8">
							<label class="mr10"><input type="radio" name="comments_open" value="open" <?= $this->allowComment ? 'checked="checked"' : '' ?> /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">开启</span></label>
							<label class="mr10"><input type="radio" name="comments_open" value="" <?= $this->allowComment ? '' : 'checked="checked"' ?> /><span class="ml6 em09 muted-color" style=" font-weight: normal; ">关闭</span></label>
						</div>
					</div>
					<input type="hidden" name="action" value="frontend_set_save">
					<input type="hidden" name="type" value="post">
					<input type="hidden" name="taxonomy" value="">
					<input type="hidden" name="post_type" value="post">
					<input type="hidden" name="id" value="<?= $this->cid ?>">
				</div>
				<div class="modal-footer">
					<!-- <a target="_blank" title="使用可视化布局配置此页面" data-toggle="tooltip" href="" class="but c-yellow-2 padding-lg"><i class="fa fa-pie-chart" aria-hidden="true"></i>模块布局</a> -->
					<a target="_blank" href="<?= $this->options->adminUrl . 'write-post.php?cid=' . $this->cid ?>" class="but c-yellow padding-lg"><i class="fa fa-wordpress" aria-hidden="true"></i>后台编辑</a>
					<button class="but jb-blue padding-lg wp-ajax-submit"><i class="fa fa-check" aria-hidden="true"></i>确认修改</button>
				</div>
			</form>
		</div>
	</div>
</div>