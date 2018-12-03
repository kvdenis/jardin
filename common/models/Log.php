<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $message
 * @property int $createdAt
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'createdAt'], 'required'],
            [['createdAt'], 'integer'],
            [['message'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'createdAt' => 'Created At',
        ];
    }
}
