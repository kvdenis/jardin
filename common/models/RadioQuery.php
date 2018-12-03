<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Radio]].
 *
 * @see Radio
 */
class RadioQuery extends \yii\db\ActiveQuery
{
    /**
     * @return RadioQuery
     */
    public function active() :RadioQuery
    {
        return $this->andWhere(['open' => true]);
    }

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
