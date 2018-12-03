<?php
namespace common\db;

use common\models\LogDatabase;
use Yii;

class ActiveRecord extends \yii\db\ActiveRecord
{

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $log = new LogDatabase();

        if ($insert) {

            $log->type = 'insert';

            $log->newData = json_encode($this->toArray());

        } else {

            $log->type = 'update';

            $log->changeData = json_encode($changedAttributes);

            $log->newData = json_encode($this->getAttributes(array_keys($changedAttributes)));
        }

        $log->userId = Yii::$app->user ? Yii::$app->user->id : null;

        $log->tableName = $this->tableName();

        $log->recordId = $this->getPrimaryKey();

        $log->createdAt = time();

        $log->save(false);
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $log = new LogDatabase();

        $log->type = 'delete';

        $log->userId = Yii::$app->user ? Yii::$app->user->id : null;

        $log->tableName = $this->tableName();

        $log->recordId = $this->getPrimaryKey();

        $log->oldData = json_encode($this->toArray());

        $log->createdAt = time();

        $log->save(false);
    }
}