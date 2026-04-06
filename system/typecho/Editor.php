<?php

namespace joe\typecho;

class Editor
{
    public static function Edit()
    {
?>
        <link async rel="stylesheet" href="<?= joe_theme_url('assets/plugin/twitter-bootstrap/3.4.1/css/tooltip.css', false); ?>">
        <link rel="stylesheet" href="<?= joe_theme_url('assets/typecho/write/css/joe.write.css') ?>">

        <!-- 自定义CSS样式 -->
        <style>
            <?php \Helper::options()->JCustomCSS(); ?>
        </style>
        <!-- 自定义CSS样式 -->

        <script>
            window.JoeConfig = {
                uploadAPI: `<?php \Helper::security()->index('/action/upload'); ?>`,
                emojiAPI: `<?php \Helper::options()->themeUrl('assets/typecho/write/json/emoji.json') ?>`,
                expressionAPI: `<?php \Helper::options()->themeUrl('assets/json/joe.owo.json') ?>`,
                characterAPI: `<?php \Helper::options()->themeUrl('assets/typecho/write/json/character.json') ?>`,
                playerAPI: `<?php empty(\Helper::options()->JCustomPlayer) ? 'false' : \Helper::options()->JCustomPlayer; ?>`,
                autoSave: <?php \Helper::options()->autoSave(); ?>,
                themeURL: `<?php \Helper::options()->themeUrl(); ?>`,
                JPrismTheme: `<?= \Helper::options()->JPrismTheme ?>`,
                canPreview: false
            }
            window.Joe = window.Joe || {};
            window.Joe.BASE_API = `<?= joe_api_url('/') ?>`;
            window.Joe.CDN_URL = `<?= joe_cdn_url() ?>`;
            window.Joe.THEME_URL = `<?= joe_theme_url('', false) ?>`;
        </script>

        <script src="<?= joe_theme_url('assets/plugin/twitter-bootstrap/3.4.1/js/tooltip.js', false); ?>"></script>
        <script src="<?= joe_theme_url('assets/plugin/layer/3.7.0/layer.js', false) ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/parse/parse.min.js', false) ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/dist/CodeMirror.js', false) ?>"></script>
        <script>
            window.Joe.tooltip = (selectors = '', options = {}) => {
                const tooltip = '[data-toggle="tooltip"]:not([data-original-title])';
                const selector = selectors ? `${selectors}${tooltip},${selectors} ${tooltip}` : tooltip;
                if (Joe.IS_MOBILE && options instanceof Object) {
                    $(selector).each(function() {
                        ['data-toggle', 'data-placement'].forEach(value => {
                            $(this).removeAttr(value);
                        });
                    });
                } else {
                    if (options instanceof Object) options.container = options.container ? options.container : 'body';
                    $(selector).tooltip(options);
                    if (options instanceof Object) $(selector).on('click', function(event) {
                        $(this).tooltip('hide');
                    });
                }
            }
        </script>
        <script src="<?= joe_theme_url('assets/js/function.js') ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/js/tools.js') ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/js/actions.js') ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/js/create.js') ?>"></script>
        <script src="<?= joe_theme_url('assets/typecho/write/js/index.js') ?>"></script>
    <?php
    }

    public static function labelSelection()
    {
    ?>
        <section class="typecho-post-option">
            <style>
                .tagshelper {
                    list-style: none;
                    border: 1px solid #D9D9D6;
                    padding: 6px;
                    max-height: 240px;
                    overflow: auto;
                    background-color: #FFF;
                    border-radius: 2px;
                }

                .tagshelper a {
                    cursor: pointer;
                    padding: 0px 6px;
                    margin: 2px 0;
                    display: inline-block;
                    border-radius: 2px;
                    text-decoration: none;
                    transition: 0.1s;
                }

                .tagshelper a:hover {
                    background: #ccc;
                    color: #fff;
                }
            </style>
            <label for="token-input-tags" class="typecho-label"><?php _e('标签选择'); ?></label>
            <ul class="tagshelper">
                <?php
                $tags = \Widget\Metas\Tag\Cloud::alloc();
                // Typecho\Widget::widget('Widget_Metas_Tag_Cloud')->to($tags);
                if ($tags->have()) {
                    $i = 0;
                    while ($tags->next()) {
                        echo "<a onclick=\"$('#tags').tokenInput('add', {id: '" . $tags->name . "', tags: '" . $tags->name . "'});\">", $tags->name, "</a>";
                        $i++;
                    }
                }
                ?>
            </ul>
        </section>
    <?php
    }

    public static function visibility()
    {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                $('select[name=visibility]').append(`<option value="private">私密</option>`);
            })
        </script>
<?php
    }
}
