<?php

use yii\db\Migration;

class m170601_104932_provinces extends Migration
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
if (!in_array('provinces', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%provinces}}', [
        'province_id' => 'CHAR(2) NOT NULL',
        0 => 'PRIMARY KEY (`province_id`)',
        'name' => 'VARCHAR(255) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
 
$this->execute('SET foreign_key_checks = 0');
$this->insert('{{%provinces}}',['province_id'=>'11','name'=>'ACEH']);
$this->insert('{{%provinces}}',['province_id'=>'12','name'=>'SUMATERA UTARA']);
$this->insert('{{%provinces}}',['province_id'=>'13','name'=>'SUMATERA BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'14','name'=>'RIAU']);
$this->insert('{{%provinces}}',['province_id'=>'15','name'=>'JAMBI']);
$this->insert('{{%provinces}}',['province_id'=>'16','name'=>'SUMATERA SELATAN']);
$this->insert('{{%provinces}}',['province_id'=>'17','name'=>'BENGKULU']);
$this->insert('{{%provinces}}',['province_id'=>'18','name'=>'LAMPUNG']);
$this->insert('{{%provinces}}',['province_id'=>'19','name'=>'KEPULAUAN BANGKA BELITUNG']);
$this->insert('{{%provinces}}',['province_id'=>'21','name'=>'KEPULAUAN RIAU']);
$this->insert('{{%provinces}}',['province_id'=>'31','name'=>'DKI JAKARTA']);
$this->insert('{{%provinces}}',['province_id'=>'32','name'=>'JAWA BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'33','name'=>'JAWA TENGAH']);
$this->insert('{{%provinces}}',['province_id'=>'34','name'=>'DI YOGYAKARTA']);
$this->insert('{{%provinces}}',['province_id'=>'35','name'=>'JAWA TIMUR']);
$this->insert('{{%provinces}}',['province_id'=>'36','name'=>'BANTEN']);
$this->insert('{{%provinces}}',['province_id'=>'51','name'=>'BALI']);
$this->insert('{{%provinces}}',['province_id'=>'52','name'=>'NUSA TENGGARA BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'53','name'=>'NUSA TENGGARA TIMUR']);
$this->insert('{{%provinces}}',['province_id'=>'61','name'=>'KALIMANTAN BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'62','name'=>'KALIMANTAN TENGAH']);
$this->insert('{{%provinces}}',['province_id'=>'63','name'=>'KALIMANTAN SELATAN']);
$this->insert('{{%provinces}}',['province_id'=>'64','name'=>'KALIMANTAN TIMUR']);
$this->insert('{{%provinces}}',['province_id'=>'65','name'=>'KALIMANTAN UTARA']);
$this->insert('{{%provinces}}',['province_id'=>'71','name'=>'SULAWESI UTARA']);
$this->insert('{{%provinces}}',['province_id'=>'72','name'=>'SULAWESI TENGAH']);
$this->insert('{{%provinces}}',['province_id'=>'73','name'=>'SULAWESI SELATAN']);
$this->insert('{{%provinces}}',['province_id'=>'74','name'=>'SULAWESI TENGGARA']);
$this->insert('{{%provinces}}',['province_id'=>'75','name'=>'GORONTALO']);
$this->insert('{{%provinces}}',['province_id'=>'76','name'=>'SULAWESI BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'81','name'=>'MALUKU']);
$this->insert('{{%provinces}}',['province_id'=>'82','name'=>'MALUKU UTARA']);
$this->insert('{{%provinces}}',['province_id'=>'91','name'=>'PAPUA BARAT']);
$this->insert('{{%provinces}}',['province_id'=>'94','name'=>'PAPUA']);
$this->execute('SET foreign_key_checks = 1;');

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `provinces`');
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
