<?php

use yii\db\Migration;

/**
 * Class m181121_063314_defaul_null
 */
class m181121_063314_defaul_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
        ALTER TABLE `slider` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 
        
        ALTER TABLE `abc` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 
        
        ALTER TABLE `video` CHANGE `info` `info` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181121_063314_defaul_null cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181121_063314_defaul_null cannot be reverted.\n";

        return false;
    }
    */
}
