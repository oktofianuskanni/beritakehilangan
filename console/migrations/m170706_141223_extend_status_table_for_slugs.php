<?php

use yii\db\Migration;

class m170706_141223_extend_status_table_for_slugs extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170706_141223_extend_status_table_for_slugs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170706_141223_extend_status_table_for_slugs cannot be reverted.\n";

        return false;
    }
    */
}
