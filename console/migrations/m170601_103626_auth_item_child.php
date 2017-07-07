<?php

use yii\db\Migration;

class m170601_103626_auth_item_child extends Migration
{
    public function up()
    {

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('auth_item_child', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%auth_item_child}}', [
                'parent' => 'VARCHAR(64) NOT NULL',
                0 => 'PRIMARY KEY (`parent`)',
                'child' => 'VARCHAR(64) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
         
         
        $this->createIndex('idx_child_7323_00','auth_item_child','child',0);
         
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_auth_item_7317_00','{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_auth_item_7317_01','{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_item_child`');
        $this->execute('SET foreign_key_checks = 1;');

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
