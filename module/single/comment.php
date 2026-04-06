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

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
$this->comments()->to($comments);
$is_comment = ($this->allow('comment') && $this->options->JCommentStatus != 'off') ? true : false;
// $login_comment = $this->options->JcommentLogin == 'on' && !is_numeric(JOE_USER_ID) ? true : false;
?>
<div class="theme-box" id="comments">
	<div class="box-body notop">
		<div class="title-theme">评论 <small><?= $this->commentsNum ? '共' . $this->commentsNum . '条' : '抢沙发' ?></small></div>
	</div>
	<div class="no_webshot main-bg theme-box box-body radius8 main-shadow">
		<?php
		if (!$is_comment) {
		?>
			<div class="text-center comment comment-null" style="padding:40px 0;">
				<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null.svg', null) ?>">
				<p style="margin-top:40px;" class="em09 muted-3-color separator">评论已关闭</p>
			</div>
			<div class="pagenav hide">
				<div class="next-page ajax-next">
					<a href="#"></a>
				</div>
			</div>
		<?php
		} else if ($this->user->hasLogin()) {
			$this->need('module/comment/respond.php');
			$this->need('module/comment/list.php');
		} else {
		?>
			<div class="comment-signarea text-center box-body radius8">
				<h3 class="text-muted em12 theme-box muted-3-color">请登录后发表评论</h3>
				<p>
					<a href="javascript:;" class="signin-loader but c-blue padding-lg">
						<i class="fa fa-fw fa-sign-in mr10" aria-hidden="true"></i>
						登录
					</a>
					<a href="javascript:;" class="signup-loader ml10 but c-yellow padding-lg">
						<svg class="icon mr10" aria-hidden="true">
							<use xlink:href="#icon-signup"></use>
						</svg>
						注册
					</a>
				</p>
			</div>
		<?php
			$this->need('module/comment/list.php');
		}
		?>
	</div>
</div>