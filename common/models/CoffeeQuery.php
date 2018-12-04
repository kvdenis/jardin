<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Coffee]].
 *
 * @see Coffee
 */
class CoffeeQuery extends \yii\db\ActiveQuery
{
    /**
     * @return CoffeeQuery
     */
    public function active() :CoffeeQuery
    {
        return $this->andWhere(['open' => Coffee::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return Coffee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Coffee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
