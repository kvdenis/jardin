<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "password".
 *
 * @property int $id
 * @property string $name
 * @property string $password
 */
class Password extends \common\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'password';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
            [['name', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PasswordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PasswordQuery(get_called_class());
    }
}
