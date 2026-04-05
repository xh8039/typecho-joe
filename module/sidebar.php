<?php
$name = $this->getArchiveType();
if (in_array($name, $this->options->joe_sidebar)) {
    echo '<div class="sidebar">';
    if (in_array($name, $this->options->joe_sidebar_user)) $this->need('module/sidebar/user.php');
    if ($this->is('post')) {
        if ($this->options->joe_article_content_nav === 'on') $this->need('module/sidebar/nav.php');
        if ($this->fields->hide == 'pay' && $this->fields->price > 0) $this->need('module/sidebar/pay.php');
    }
    if (in_array($name, $this->options->joe_sidebar_hot_post)) $this->need('module/sidebar/hot.php');
    if (in_array($name, $this->options->joe_sidebar_new_comment)) $this->need('module/sidebar/comment.php');
    if (in_array($name, $this->options->joe_sidebar_tag_list)) $this->need('module/sidebar/tag.php');
    if (in_array($name, $this->options->joe_sidebar_motto)) $this->need('module/sidebar/motto.php');
    // $this->need('module/sidebar/yiyan.php');
    if (in_array($name, $this->options->joe_sidebar_custom_html)) echo $this->options->joe_sidebar_html;
    echo '</div>';
}
