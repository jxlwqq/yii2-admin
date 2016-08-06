<?php

use yii\db\Migration;

class m160806_063034_init extends Migration
{
    public function up()
    {
        $sql = <<<EOD
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `abstract` varchar(256) NOT NULL DEFAULT '' COMMENT '摘要',
  `source` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `create_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `modify_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章表';
// todo
EOD;
        $this->execute($sql);
    }

    public function down()
    {
        echo "m160806_063034_init cannot be reverted.\n";

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
