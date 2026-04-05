<?php
if ($this->options->joe_global_loading_animation_only_first == 'on') Typecho\Cookie::get('__joe_global_loading_animation_only_first') ? $this->options->joe_global_loading_animation = '' : Typecho\Cookie::set('__joe_global_loading_animation_only_first', 'true');
$file = $this->options->joe_global_loading_animation;
if (empty($file)) return;
$file = JOE_ROOT . 'module/loading/' . $file . '.php';
if (file_exists($file)) require_once $file;