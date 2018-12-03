<?php

use yii\db\Migration;

/**
 * Class m181203_075910_log
 */
class m181203_075910_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(250) NOT NULL,
  `createdAt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_075910_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_075910_log cannot be reverted.\n";

        return false;
    }
    */
}
