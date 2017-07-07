<?php

use yii\db\Migration;

class m170601_105610_category extends Migration
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
if (!in_array('category', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%category}}', [
        'category_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`category_id`)',
        'category_name' => 'VARCHAR(32) NOT NULL',
        'status' => 'ENUM(\'Enable\',\'Disable\') NULL',
        'created_at' => 'DATETIME NOT NULL',
        'updated_at' => 'DATETIME NOT NULL',
    ], $tableOptions_mysql);
}
}
 
 
$this->createIndex('idx_UNIQUE_category_name_2387_00','category','category_name',1);
 
$this->execute('SET foreign_key_checks = 0');
$this->insert('{{%category}}',['category_id'=>'1','category_name'=>'Mobil','status'=>'Enable','created_at'=>'2017-05-28 15:15:16','updated_at'=>'2017-05-28 15:15:16']);
$this->insert('{{%category}}',['category_id'=>'2','category_name'=>'Motor','status'=>'Enable','created_at'=>'2017-05-28 15:15:23','updated_at'=>'2017-05-28 15:15:23']);
$this->insert('{{%category}}',['category_id'=>'3','category_name'=>' Elektronik & Gadget','status'=>'Enable','created_at'=>'2017-05-28 15:15:46','updated_at'=>'2017-05-28 15:15:46']);
$this->insert('{{%category}}',['category_id'=>'4','category_name'=>'Surat-surat','status'=>'Enable','created_at'=>'2017-05-28 15:15:54','updated_at'=>'2017-05-28 15:15:54']);
$this->insert('{{%category}}',['category_id'=>'5','category_name'=>'Uang','status'=>'Enable','created_at'=>'2017-05-28 15:16:05','updated_at'=>'2017-05-28 15:16:05']);
$this->insert('{{%category}}',['category_id'=>'6','category_name'=>'Emas','status'=>'Enable','created_at'=>'2017-05-28 15:16:20','updated_at'=>'2017-05-28 15:16:20']);
$this->insert('{{%category}}',['category_id'=>'7','category_name'=>'Kunci','status'=>'Enable','created_at'=>'2017-05-28 15:16:33','updated_at'=>'2017-05-28 15:16:33']);
$this->insert('{{%category}}',['category_id'=>'8','category_name'=>'Lain-lain','status'=>'Enable','created_at'=>'2017-05-28 15:16:43','updated_at'=>'2017-05-28 15:16:43']);
$this->execute('SET foreign_key_checks = 1;');

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `category`');
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
