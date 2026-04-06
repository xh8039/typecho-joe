<div class="ajaxpager tab-pane fade author-user-con <?= $tab_name == 'account' ? 'in active' : '' ?>" id="user-tab-account">
    <?php
    if ($tab_name == 'account') {
    ?>
        <div class="ajax-item">
            <div class="zib-widget account-set nopw-sm">
                <div class="box-body">
                    <div class="title-h-left">
                        <b>绑定邮箱</b>
                    </div>
                    <div class="muted-2-color mb20">绑定邮箱账号，及时接收订单、审核等重要信息</div>
                    <div class="oauth-bind-box">
                        <div class="">
                            <div class="flex ac jsb muted-box">
                                <div class="flex ac type-logo">
                                    <span class="b-blue circular mr6 em14">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="">邮箱</span>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="text-ellipsis muted-2-color"><?= $this->user->mail ?></div>
                                </div>
                                <div class="shrink0">
                                    <a data-class="modal-mini" mobile-bottom="true" data-height="220" data-remote="<?= joe_api_url('user_set_modal', ['tab' => 'email']) ?>" class="collection-set-link but c-yellow-2 p2-10 but hollow" href="javascript:;" data-toggle="RefreshModal">修改</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="title-h-left">
                        <b>账户密码</b>
                    </div>
                    <div class="muted-2-color mb20">定期修改密码有助于账户安全</div>
                    <div>
                        <div class="oauth-bind-box">
                            <div class="">
                                <div class="flex ac jsb muted-box">
                                    <div class="flex ac type-logo">
                                        <span class="b-purple circular mr6 em14">
                                            <i class="fa fa-unlock-alt"></i>
                                        </span>
                                        <span class="">账户密码</span>
                                    </div>
                                    <div class="">
                                        <a data-class="modal-mini" mobile-bottom="true" data-height="220" data-remote="<?= joe_api_url('user_set_modal', ['tab' => 'change_password']) ?>" class="collection-set-link but c-blue-2 hollow" href="javascript:;" data-toggle="RefreshModal">修改密码</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <a href="<?= joe_build_url('user/account') ?>" class="ajax_load ajax-next ajax-open"></a>
        </span>
    <?php
    }
    ?>
    <div class="post_ajax_loader" style="display: none;">
        <div class="zib-widget">
            <div class="mt10">
                <div class="placeholder k1 mb10"></div>
                <div class="placeholder k1 mb10"></div>
                <div class="placeholder s1"></div>
            </div>
            <p class="placeholder k1 mb30"></p>
            <div class="placeholder t1 mb30"></div>
            <p class="placeholder k1 mb30"></p>
            <p style="height: 120px;" class="placeholder t1"></p>
        </div>
    </div>
</div>