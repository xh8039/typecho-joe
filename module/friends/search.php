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
<div class="page-cover theme-box radius8 main-shadow link-page-search-cover">
    <?php
    $JFriends_Search_Background = empty($this->options->JFriends_Search_Background) ? joe_theme_url('assets/img/user_t.jpg', null) : $this->options->JFriends_Search_Background;
    ?>
    <img class="fit-cover no-scale lazyload" referrerpolicy="no-referrer" rel="noreferrer" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" data-src="<?= $JFriends_Search_Background ?>">
    <div class="header-slider-search abs-center">
        <div class="header-slider-search-more text-center before">
            <div class="em14 font-bold mb10"><?= $this->title ?></div>
        </div>
        <div class="search-input">
            <div class="flex jc">
                <ul class="list-inline scroll-x mini-scrollbar tab-nav-theme">
                    <li class=" active">
                        <a class="" data-toggle="tab" data-target="#link-page-49-self" href="javascript:;">站内</a>
                    </li>
                    <li class="">
                        <a class="" data-toggle="tab" data-target="#link-page-49-baidu" href="javascript:;">百度</a>
                    </li>
                    <li class="">
                        <a class="" data-toggle="tab" data-target="#link-page-49-bing" href="javascript:;">必应</a>
                    </li>
                    <li class="">
                        <a class="" data-toggle="tab" data-target="#link-page-49-sogou" href="javascript:;">搜狗</a>
                    </li>
                    <li class="">
                        <a class="" data-toggle="tab" data-target="#link-page-49-360" href="javascript:;">360</a>
                    </li>
                    <li class="">
                        <a class="" data-toggle="tab" data-target="#link-page-49-google" href="javascript:;">谷歌</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane in active" id="link-page-49-self">
                    <form method="get" target="_blank" class="padding-10 search-form" action="/">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="s" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">站内搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="link-page-49-baidu">
                    <form method="get" target="_blank" class="padding-10 search-form" action="https://www.baidu.com/s">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="wd" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">百度搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="link-page-49-bing">
                    <form method="get" target="_blank" class="padding-10 search-form" action="https://cn.bing.com/search?">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="q" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">必应搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="link-page-49-sogou">
                    <form method="get" target="_blank" class="padding-10 search-form" action="https://www.sogou.com/web?">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="query" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">搜狗搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="link-page-49-360">
                    <form method="get" target="_blank" class="padding-10 search-form" action="https://www.so.com/s?">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="q" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">360搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="link-page-49-google">
                    <form method="get" target="_blank" class="padding-10 search-form" action="https://www.google.com/search?">
                        <div class="line-form blur-bg">
                            <div class="search-input-text">
                                <input type="text" name="q" class="line-form-input" tabindex="1" value="" autocomplete="off">
                                <i class="line-form-line"></i>
                                <div class="scale-placeholder">谷歌搜索</div>
                                <div class="abs-right muted-color">
                                    <button type="submit" tabindex="2" class="null">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>