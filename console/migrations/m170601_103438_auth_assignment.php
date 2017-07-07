<?php

use yii\db\Migration;

class m170601_103438_auth_assignment extends Migration
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
        if (!in_array('auth_assignment', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%auth_assignment}}', [
                'item_name' => 'VARCHAR(64) NOT NULL',
                0 => 'PRIMARY KEY (`item_name`)',
                'user_id' => 'INT(11) NOT NULL',
                'created_at' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
         
         
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_auth_item_166_00','{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
         
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%auth_assignment}}',['item_name'=>'admin','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'create-branches','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'create-companies','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'create-department','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'delete-branches','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'delete-companies','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'delete-department','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'update-branches','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'update-companies','user_id'=>'6','created_at'=>'']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'update-department','user_id'=>'6','created_at'=>'']);
        $this->execute('SET foreign_key_checks = 1;');

    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_assignment`');
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
