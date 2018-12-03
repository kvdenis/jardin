<?php

use yii\db\Migration;

/**
 * Class m181203_075642_log_database
 */
class m181203_075642_log_database extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("

CREATE TABLE `log_database` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` bigint(20) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `action` varchar(50) DEFAULT NULL,
  `tableName` varchar(50) NOT NULL,
  `recordId` bigint(20) NOT NULL,
  `oldData` text,
  `newData` text,
  `changeData` text,
  `createdAt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `log_database`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);
  
ALTER TABLE `log_database`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_075642_log_database cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_075642_log_database cannot be reverted.\n";

        return false;
    }
    */
}
