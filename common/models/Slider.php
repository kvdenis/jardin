<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property integer $open
 */
class Slider extends \common\db\ActiveRecord
{
    /** @var UploadedFile */
    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link'], 'string', 'max' => 255],
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
            'link' => 'Ссылка',
            'image' => 'Фото',
            'img' => 'Фото',
        ];
    }

    public function attributeHints()
    {
        return [
            'image' => '1136x353',
        ];
    }

    public function beforeSave($insert) :bool
    {
        if ($this->img) {

            $this->image = md5($this->img->baseName . '_' . time()) . '.' . $this->img->extension;

            $this->img->saveAs(Yii::$aliases['@frontend'] . '/web/upload/image/' . $this->image);
        }

        return parent::beforeSave($insert);
    }

    public function fields()
    {
        return array_merge(parent::fields(), [

            'urlImage' => function(){
                return $this->getUrlImage();
            },

        ]);
    }

    public function getUrlImage() :string
    {
        return Yii::$app->params['urlUpload'] . '/upload/' . $this->image;
    }

    /**
     * {@inheritdoc}
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }
}
