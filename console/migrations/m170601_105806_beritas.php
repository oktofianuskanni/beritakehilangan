<?php

use yii\db\Migration;

class m170601_105806_beritas extends Migration
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
        if (!in_array('beritas', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%beritas}}', [
                'berita_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`berita_id`)',
                'user_id' => 'INT(11) NOT NULL',
                'category_id' => 'INT(11) NOT NULL',
                'jenis_berita' => 'ENUM(\'Kehilangan\',\'Ditemukan\') NOT NULL',
                'judul_berita' => 'VARCHAR(200) NOT NULL',
                'deskripsi_berita' => 'TEXT NOT NULL',
                'tanggal_kejadian' => 'DATE NOT NULL',
                'email' => 'VARCHAR(100) NOT NULL',
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
        $this->execute('DROP TABLE IF EXISTS `beritas`');
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
