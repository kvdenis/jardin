<?php

namespace common\models;

/**
 * This is the model class for table "coffee_text".
 *
 * @property int $id
 * @property string $info1
 * @property string $info2
 */
class CoffeeText extends \common\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coffee_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info1', 'info2'], 'required'],
            [['info1', 'info2'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info1' => 'Жареный',
            'info2' => 'Растворимый',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CoffeeTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoffeeTextQuery(get_called_class());
    }
}
