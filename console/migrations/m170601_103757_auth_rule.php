<?php

use yii\db\Migration;

class m170601_103757_auth_rule extends Migration
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
        if (!in_array('auth_rule', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%auth_rule}}', [
                'name' => 'VARCHAR(64) NOT NULL',
                0 => 'PRIMARY KEY (`name`)',
                'data' => 'TEXT NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
 

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_rule`');
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
