<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CoffeeText]].
 *
 * @see CoffeeText
 */
class CoffeeTextQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CoffeeText[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CoffeeText|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
