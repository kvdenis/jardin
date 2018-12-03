<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Slider]].
 *
 * @see Slider
 */
class SliderQuery extends \yii\db\ActiveQuery
{
    /**
     * @return SliderQuery
     */
    public function active() :SliderQuery
    {
        return $this->andWhere(['open' => true]);
    }
    /**
     * {@inheritdoc}
     * @return Slider[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Slider|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
