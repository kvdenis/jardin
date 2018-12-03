<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "titles".
 *
 * @property int $id
 * @property string $title
 * @property int $open
 */
class Titles extends \common\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'open'], 'required'],
            [['open'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'open' => 'Показать',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TitlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TitlesQuery(get_called_class());
    }
}
