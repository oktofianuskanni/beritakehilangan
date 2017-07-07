<?php

use yii\db\Migration;

class m170601_103119_auth_item extends Migration
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
        if (!in_array('auth_item', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%auth_item}}', [
                'name' => 'VARCHAR(64) NOT NULL',
                0 => 'PRIMARY KEY (`name`)',
                'type' => 'INT(11) NOT NULL',
                'description' => 'TEXT NULL',
                'rule_name' => 'VARCHAR(64) NULL',
                'data' => 'TEXT NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
         
         
        $this->createIndex('idx_rule_name_4658_00','auth_item','rule_name',0);
        $this->createIndex('idx_type_4658_01','auth_item','type',0);
         
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_auth_rule_4652_00','{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
         
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%auth_item}}',['name'=>'admin','type'=>'1','description'=>'admin can creat all','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'create-branches','type'=>'2','description'=>'admin can create branches','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'create-companies','type'=>'3','description'=>'admin can create an a companies','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'create-department','type'=>'4','description'=>'admin can create departmernts','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'delete-branches','type'=>'2','description'=>'admin can delete branches','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'delete-companies','type'=>'3','description'=>'admin can delete companies','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'delete-department','type'=>'4','description'=>'admin can delete departmernts','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'update-branches','type'=>'2','description'=>'admin can update branches','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'update-companies','type'=>'3','description'=>'admin can update companies','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%auth_item}}',['name'=>'update-department','type'=>'4','description'=>'admin can update departmernts','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_item`');
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
