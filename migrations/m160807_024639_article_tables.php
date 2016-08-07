<?php

use yii\db\Migration;

class m160807_024639_article_tables extends Migration
{
    public function up()
    {
        $sql = <<<EOD
DROP TABLE IF EXISTS article;
CREATE TABLE IF NOT EXISTS `article` (
  `id`              INT(11)      NOT NULL AUTO_INCREMENT,
  `title`           VARCHAR(100) NOT NULL DEFAULT ''
  COMMENT '标题',
  `author`          VARCHAR(20)  NOT NULL DEFAULT ''
  COMMENT '作者',
  `abstract`        VARCHAR(256) NOT NULL DEFAULT ''
  COMMENT '摘要',
  `source`          VARCHAR(100) NOT NULL DEFAULT ''
  COMMENT '来源',
  `comment_count`   MEDIUMINT(9) NOT NULL DEFAULT '0',
  `like_count`      MEDIUMINT(9) NOT NULL DEFAULT '0',
  `favorite_count`  MEDIUMINT(9) NOT NULL DEFAULT '0',
  `create_datetime` TIMESTAMP    NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
  COMMENT '修改时间',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT = '文章表';

DROP TABLE IF EXISTS article_comment;
CREATE TABLE IF NOT EXISTS `article_comment` (
  `id`              INT(11)      NOT NULL AUTO_INCREMENT,
  `article_id`      INT(11)      NOT NULL DEFAULT '0'
  COMMENT '文章id',
  `user_id`         INT(11)      NOT NULL DEFAULT '0'
  COMMENT '用户id',
  `comment`         VARCHAR(500) NOT NULL DEFAULT ''
  COMMENT '评论内容',
  `like_count`      MEDIUMINT(9) NOT NULL DEFAULT '0'
  COMMENT '点赞数',
  `create_datetime` TIMESTAMP    NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_au` (`article_id`, `user_id`),
  KEY `idx_ua` (`user_id`, `article_id`)
)
  ENGINE = innodb
  DEFAULT CHARSET = utf8
  COMMENT = '文章评论表';

DROP TABLE IF EXISTS article_content;
CREATE TABLE IF NOT EXISTS `article_content` (
  `id`              INT(11)   NOT NULL AUTO_INCREMENT,
  `article_id`      INT(11)   NOT NULL DEFAULT '0'
  COMMENT '文章id',
  `content`         TEXT      NOT NULL
  COMMENT '文章正文',
  `create_datetime` TIMESTAMP NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_a` (`article_id`)
)
  ENGINE = innodb
  DEFAULT CHARSET = utf8
  COMMENT = '文章正文表';

DROP TABLE IF EXISTS article_tag;
CREATE TABLE IF NOT EXISTS `article_tag` (
  `id`              INT(11)   NOT NULL AUTO_INCREMENT,
  `article_id`      INT(11)   NOT NULL DEFAULT '0'
  COMMENT '文章id',
  `tag_id`          INT(11)   NOT NULL DEFAULT '0'
  COMMENT '标签id',
  `create_datetime` TIMESTAMP NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_at` (`article_id`, `tag_id`),
  KEY `idx_ta` (`tag_id`, `article_id`)
)
  ENGINE = innodb
  DEFAULT CHARSET = utf8
  COMMENT = '文章标签关系表';

DROP TABLE IF EXISTS tag;
CREATE TABLE IF NOT EXISTS `tag` (
  `id`              INT(11)     NOT NULL AUTO_INCREMENT,
  `tag`             VARCHAR(50) NOT NULL DEFAULT ''
  COMMENT '标签',
  `desc`            VARCHAR(255)         DEFAULT ''
  COMMENT '描述',
  `create_datetime` TIMESTAMP   NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_t` (`tag`)
)
  ENGINE = innodb
  DEFAULT CHARSET = utf8
  COMMENT = '标签表';

DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS `user` (
  `id`              INT(11)     NOT NULL AUTO_INCREMENT
  COMMENT '用户id',
  `user_name`       VARCHAR(50) NOT NULL DEFAULT ''
  COMMENT '用户名',
  `email`           VARCHAR(50) NOT NULL DEFAULT ''
  COMMENT '邮箱',
  `phone`           BIGINT(20)  NOT NULL DEFAULT '0'
  COMMENT '手机号',
  `password`        CHAR(32)             DEFAULT ''
  COMMENT '密码',
  `create_datetime` TIMESTAMP   NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_up` (`user_name`, `password`),
  UNIQUE KEY `idx_ep` (`email`, `password`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT = '用户表';
DROP TABLE IF EXISTS user_login_log;

CREATE TABLE IF NOT EXISTS `user_login_log` (
  `id`              BIGINT(20) NOT NULL AUTO_INCREMENT,
  `user_id`         BIGINT(20) NOT NULL DEFAULT '0'
  COMMENT '用户id',
  `create_datetime` TIMESTAMP  NOT NULL DEFAULT '1970-01-02 00:00:00'
  COMMENT '创建时间',
  `modify_datetime` TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_u` (`user_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT = '用户登录日志表';
EOD;
;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m160807_024639_article_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
