<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "abc".
 *
 * @property int $id
 * @property int $parentid
 * @property string $title
 * @property string $info
 * @property string $image
 * @property integer $open
 *
 * @property Abc $parent
 * @property Abc[] $childes
 */
class Abc extends \common\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;

    /** @var UploadedFile */
    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentid', 'title'], 'required'],
            [['parentid'], 'integer'],
            [['info'], 'string'],
            [['title'], 'string', 'max' => 255],

            ['open', 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'title' => 'Название',
            'info' => 'Текст',
            'image' => 'Фото',
            'img' => 'Фото',
            'open' => 'Показать',
        ];
    }

    public function attributeHints()
    {
        return [
            'image' => '200x180',
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
                return $this->image ? $this->getUrlImage() : null;
            },

            'childes' => function(){
                return $this->getChildes()->orderBy(['title' => SORT_ASC])->all();
            },

        ]);
    }

    public function getUrlImage() :string
    {
        return Yii::$app->params['urlUpload'] . '/upload/' . $this->image;
    }

    /**
     * {@inheritdoc}
     * @return AbcQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AbcQuery(get_called_class());
    }

    /**
     * @return CoffeeQuery
     */
    public function getParent()
    {
        return $this->hasOne(Abc::class, ['id' => 'parentid']);
    }

    /**
     * @return CoffeeQuery
     */
    public function getChildes()
    {
        return $this->hasMany(Abc::class, ['parentid' => 'id']);
    }
}
