<?php

use yii\db\Migration;

/**
 * Class m200110_095251_send
 */
class m200110_095251_send extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('send', [

            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'sumBy' => $this->float(),
            'sumUSA' => $this->float(),
            'image' => $this->string()

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('send');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_095251_send cannot be reverted.\n";

        return false;
    }
    */
}
