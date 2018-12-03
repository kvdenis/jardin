<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $title
 * @property string $info
 * @property string $url
 * @property string $image
 * @property integer $open
 */
class Video extends \common\db\ActiveRecord
{
    /** @var UploadedFile */
    public $mp4;

    /** @var UploadedFile */
    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'url', 'image'], 'string', 'max' => 255],

            ['info', 'string'],
            ['info', 'default', 'value' => null],

            ['img', 'file', 'extensions'=>'jpg, gif, png'],

            ['mp4', 'file', 'extensions'=>'mp4', 'checkExtensionByMimeType' => false],
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
            'info' => 'Текст',
            'url' => 'MP4',
            'mp4' => 'MP4',
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

        if ($this->mp4) {

            $this->url = md5($this->mp4->baseName . '_' . time()) . '.' . $this->mp4->extension;

            $this->mp4->saveAs(Yii::$aliases['@frontend'] . '/web/upload/video/' . $this->url);
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
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }
}
