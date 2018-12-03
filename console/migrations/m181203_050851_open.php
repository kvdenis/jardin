<?php

use yii\db\Migration;

/**
 * Class m181203_050851_open
 */
class m181203_050851_open extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
        ALTER TABLE `news` ADD `open` SMALLINT(1) NOT NULL DEFAULT '1' AFTER `dte`, ADD INDEX (`open`); 
        
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_050851_open cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_050851_open cannot be reverted.\n";

        return false;
    }
    */
}
