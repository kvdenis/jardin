<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Radio]].
 *
 * @see Radio
 */
class RadioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Radio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Radio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
