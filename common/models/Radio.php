<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "radio".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 */
class Radio extends \yii\db\ActiveRecord
{
    /** @var UploadedFile */
    public $mp3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'radio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['title', 'url'], 'string', 'max' => 255],

            ['mp3', 'file', 'extensions'=>'mp3', 'checkExtensionByMimeType' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'url' => 'MP3',
            'mp3' => 'MP3',
        ];
    }

    public function beforeSave($insert) :bool
    {
        if ($this->mp3) {

            $this->url = md5($this->mp3->baseName . '_' . time()) . '.' . $this->mp3->extension;

            $this->mp3->saveAs(Yii::$aliases['@frontend'] . '/web/upload/audio/' . $this->url);
        }

        return parent::beforeSave($insert);
    }


    public function fields()
    {
        return array_merge(parent::fields(), [

            'absoluteUrl' => function(){
                return $this->getAbsoluteUrl();
            },

        ]);
    }

    public function getAbsoluteUrl() :string
    {
        return Yii::$app->params['urlUpload'] . '/upload/' . $this->url;
    }

    /**
     * {@inheritdoc}
     * @return RadioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RadioQuery(get_called_class());
    }
}
