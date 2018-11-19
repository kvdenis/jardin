<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "coffee".
 *
 * @property int $id
 * @property int $parentid
 * @property string $title
 * @property string $info
 * @property string $image
 * @property int $rating
 * @property string $composition
 * @property string $pack
 * @property int $tpe
 * @property int $line
 * @property string $shop1
 * @property string $shop2
 * @property string $shop3
 * @property string $shop4
 * @property string $shop5
 * @property string $shop6
 * @property string $shop7
 * @property int $open
 *
 * @property Coffee $parent
 * @property Coffee[] $coffees
 */
class Coffee extends \yii\db\ActiveRecord
{
    /** @var UploadedFile */
    public $img;

    public static function getTpeItems()
    {
        return [
            1 => 'Молотый',
            2 => 'В зернах',
            3 => 'Растворимый',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coffee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentid', 'title', 'info', 'rating', 'composition', 'open'], 'required', 'when' => function(){
                return $this->parentid==0;
            }],
            [['pack', 'tpe'], 'required', 'when' => function(){
                return $this->parentid != 0;
            }],
            [['parentid', 'rating', 'tpe', 'line', 'open'], 'integer'],
            [['info', 'composition'], 'string'],
            [['title', 'image', 'pack', 'shop1', 'shop2', 'shop3', 'shop4', 'shop5', 'shop6', 'shop7'], 'string', 'max' => 255],
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
            'info' => 'Описание',
            'image' => 'Фото',
            'img' => 'Фото',
            'rating' => 'Рейтинг',
            'composition' => 'Состав',
            'pack' => 'Размер',
            'tpe' => 'Вид',
            'line' => 'Line',
            'shop1' => 'OZON',
            'shop2' => 'Комус',
            'shop3' => 'Офисмаг',
            'shop4' => 'Утконос',
            'shop5' => 'Gl. Trading',
            'shop6' => 'Оф. служба',
            'shop7' => 'Онлайн трейд',
            'open' => 'Показать',
        ];
    }

    public function attributeHints()
    {
        return [
            'image' => '150x248',
        ];
    }

    public function beforeSave($insert) :bool
    {
        if ($this->img) {

            $this->image = md5($this->img->baseName . '_' . time()) . '.' . $this->img->extension;

            $this->img->saveAs(Yii::$aliases['@frontend'] . '/web/upload/' . $this->image);
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
     * @return CoffeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoffeeQuery(get_called_class());
    }

    /**
     * @return CoffeeQuery
     */
    public function getParent()
    {
        return $this->hasOne(Coffee::class, ['id' => 'parentid']);
    }

    /**
     * @return CoffeeQuery
     */
    public function getCoffees()
    {
        return $this->hasMany(Coffee::class, ['parentid' => 'id']);
    }
}
