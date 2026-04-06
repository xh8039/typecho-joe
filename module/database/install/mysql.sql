CREATE TABLE IF NOT EXISTS `prefix_orders` (
	`id` INT NOT NULL AUTO_INCREMENT COMMENT '订单主键ID',
	`trade_no` varchar(64) NOT NULL UNIQUE COMMENT '商户订单号',
	`api_trade_no` varchar(64) DEFAULT NULL COMMENT '第三方支付订单号',
	`name` varchar(64) NOT NULL COMMENT '商品/订单名称',
	`content_title` varchar(150) DEFAULT NULL COMMENT '内容标题',
	`content_cid` INT NOT NULL COMMENT '内容分类ID',
	`type` varchar(10) NOT NULL COMMENT '订单类型',
	`money` varchar(32) NOT NULL COMMENT '订单金额',
	`ip` varchar(128) DEFAULT NULL COMMENT '下单IP',
	`user_id` INT(10) NOT NULL COMMENT '用户ID',
	`created` INT(10) NOT NULL DEFAULT '0' COMMENT '创建时间戳',
	`modified` INT(10) NOT NULL DEFAULT '0' COMMENT '修改时间戳',
	`timeout` INT(10) NOT NULL DEFAULT '1800' COMMENT '订单超时时间(秒)',
	`pay_type` varchar(10) DEFAULT NULL COMMENT '支付方式',
	`pay_price` varchar(32) DEFAULT NULL COMMENT '实际支付金额',
	`admin_email` BOOLEAN NOT NULL DEFAULT FALSE COMMENT '管理员邮件通知 0=关闭 1=开启',
	`user_email` BOOLEAN NOT NULL DEFAULT FALSE COMMENT '用户邮件通知 0=关闭 1=开启',
	`status` BOOLEAN NOT NULL DEFAULT FALSE COMMENT '订单状态 0=未支付 1=已支付',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4 COMMENT='订单主表';

CREATE TABLE IF NOT EXISTS `prefix_friends` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`url` varchar(255) NOT NULL,
	`description` TEXT DEFAULT NULL,
	`logo` TEXT DEFAULT NULL,
	`rel` varchar(255) DEFAULT NULL,
	`position` varchar(255) DEFAULT NULL,
	`email` varchar(64) DEFAULT NULL,
	`order` INT NOT NULL DEFAULT 0,
	`status` BOOLEAN NOT NULL DEFAULT FALSE,
	`create_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8mb4;

ALTER TABLE `prefix_contents` ADD `views` INT NOT NULL DEFAULT 0;
ALTER TABLE `prefix_contents` ADD `agree` INT NOT NULL DEFAULT 0;
ALTER TABLE `prefix_comments` ADD `agree` INT NOT NULL DEFAULT 0;
ALTER TABLE `prefix_metas` ADD `image` VARCHAR(255) NULL DEFAULT NULL AFTER `description`;
INSERT INTO `prefix_friends` (`title`, `url`, `logo`, `description`, `rel`, `position`, `status`) VALUES ('易航博客', 'http://blog.yihang.info/', '//blog.yihang.info/favicon.ico', '一名编程爱好者的博客，记录与分享编程、学习中的知识点', 'friend', 'single,index_bottom', 1);