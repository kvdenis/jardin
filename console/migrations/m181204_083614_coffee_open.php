<?php

use yii\db\Migration;

/**
 * Class m181204_083614_coffee_open
 */
class m181204_083614_coffee_open extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
        UPDATE `coffee` SET open=1 WHERE parentid > 0;
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181204_083614_coffee_open cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181204_083614_coffee_open cannot be reverted.\n";

        return false;
    }
    */
}
