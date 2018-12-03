<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "logDatabase".
 *
 * @property int $id
 * @property int $userId
 * @property string $type
 * @property string $action
 * @property string $tableName
 * @property int $recordId
 * @property string $oldData
 * @property string $newData
 * @property string $changeData
 * @property float $amount
 * @property int $createdAt
 */
class LogDatabase extends \yii\db\ActiveRecord
{
    const TYPE_INSERT = 'insert';
    const TYPE_UPDATE = 'update';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_database';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'type', 'tableName', 'recordId', 'createdAt'], 'required'],
            [['userId', 'recordId', 'createdAt'], 'integer'],
            [['oldData', 'newData', 'changeData'], 'string'],
            [['type'], 'string', 'max' => 15],
            [['tableName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'type' => 'Type',
            'tableName' => 'Table Name',
            'recordId' => 'Record ID',
            'oldData' => 'Old Data',
            'newData' => 'New Data',
            'changeData' => 'Change Data',
            'createdAt' => 'Created At',
        ];
    }
}
