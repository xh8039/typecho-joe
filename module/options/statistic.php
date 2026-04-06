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

if (!defined('__TYPECHO_ROOT_DIR__')) {http_response_code(404);exit(1);}

// $statistics_config = joe_baidu_statistic_config();
// $update_access_token_url = $statistics_config ? '操作：<a href="http://openapi.baidu.com/oauth/2.0/token?grant_type=refresh_token&refresh_token=' . urlencode($statistics_config['refresh_token']) . '&client_id=' . urlencode($statistics_config['client_id']) . '&client_secret=' . urlencode($statistics_config['client_secret']) . '">一键更新access_token</a>（手动更新后请手动在主题设置处填写已更新的token）<br>' : NULL;
// $baidu_statistics = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'baidu_statistics',
// 	NULL,
// 	NULL,
// 	'百度统计配置（非必填）',
// 	'介绍：用于展示站点的百度统计信息<br>
// 	格式：第一行填写：access_token，二：refresh_token，三：API Key，四：Secret Key<br>
// 	' . $update_access_token_url . '
// 	百度统计API文档：<a target="_blank" href="https://tongji.baidu.com/api/manual/Chapter2/openapi.html">tongji.baidu.com/api/manual/Chapter2/openapi.html</a>'
// );
// $baidu_statistics->setAttribute('class', 'joe_content joe_statistic');
// $baidu_statistics->setInputsAttribute('rows', '4');
// $form->addInput($baidu_statistics);



// $JBTPanel = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JBTPanel',
// 	NULL,
// 	NULL,
// 	'宝塔面板地址',
// 	'介绍：用于统计页面获取服务器状态使用 <br>
// 		 例如：http://192.168.1.245:8888/ <br>
// 		 注意：结尾需要带有一个 / 字符！<br>
// 		 该功能需要去宝塔面板开启开放API，并添加白名单才可使用'
// );
// $JBTPanel->setAttribute('class', 'joe_content joe_statistic');
// $form->addInput($JBTPanel->multiMode());

// $JBTKey = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JBTKey',
// 	NULL,
// 	NULL,
// 	'宝塔开放接口密钥',
// 	'介绍：用于统计页面获取服务器状态使用 <br>
// 		 例如：thVLXFtUCCNzBShBweKTPBmw8296q8R8 <br>
// 		 该功能需要去宝塔面板开启开放API，并添加白名单才可使用'
// );
// $JBTKey->setAttribute('class', 'joe_content joe_statistic');
// $form->addInput($JBTKey->multiMode());