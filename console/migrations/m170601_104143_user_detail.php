<?php

use yii\db\Migration;

class m170601_104143_user_detail extends Migration
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
        if (!in_array('user_detail', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%user_detail}}', [
                'user_detail_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`user_detail_id`)',
                'user_id' => 'INT(11) NOT NULL',
                'email' => 'VARCHAR(100) NOT NULL',
                'alamat' => 'VARCHAR(100) NOT NULL',
                'hub_email' => 'VARCHAR(100) NOT NULL',
                'no_telp1' => 'VARCHAR(100) NOT NULL',
                'no_telp2' => 'VARCHAR(100) NOT NULL',
                'pin_bb' => 'VARCHAR(100) NOT NULL',
                'hub_wa' => 'VARCHAR(100) NOT NULL',
                'status' => 'ENUM(\'Enable\',\'Disable\') NOT NULL',
                'province_id' => 'INT(11) NOT NULL',
                'regency_id' => 'INT(11) NOT NULL',
                'district_id' => 'INT(11) NOT NULL',
                'village_id' => 'INT(11) NOT NULL',
                'created_at' => 'DATETIME NOT NULL',
                'updated_at' => 'DATETIME NOT NULL',
            ], $tableOptions_mysql);
        }
        }
         

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user_detail`');
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
