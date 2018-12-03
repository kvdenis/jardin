<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $short
 * @property string $info
 * @property string $image
 * @property string $dte
 * @property integer $open
 */
class News extends \yii\db\ActiveRecord
{
    /** @var UploadedFile */
    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'short', 'info', 'dte'], 'required'],
            [['short', 'info'], 'string'],
            [['dte'], 'string'],
            [['title'], 'string', 'max' => 255],

            ['img', 'safe'],
            ['img', 'file', 'extensions'=>'jpg, gif, png'],
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
            'short' => 'Анонс',
            'info' => 'Текст',
            'image' => 'Фото',
            'img' => 'Фото',
            'dte' => 'Дата',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeHints()
    {
        return [
            'image' => '640x480 ',
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
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
