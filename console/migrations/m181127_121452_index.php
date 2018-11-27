<?php

use yii\db\Migration;

/**
 * Class m181127_121452_index
 */
class m181127_121452_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
ALTER TABLE `abc` ADD INDEX(`parentid`); 
ALTER TABLE `coffee` ADD INDEX(`parentid`); 
ALTER TABLE `titles` ADD INDEX(`open`); 
ALTER TABLE `coffee` ADD INDEX( `parentid`, `open`); 
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181127_121452_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181127_121452_index cannot be reverted.\n";

        return false;
    }
    */
}
