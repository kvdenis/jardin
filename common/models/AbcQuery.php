<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Abc]].
 *
 * @see Abc
 */
class AbcQuery extends \yii\db\ActiveQuery
{
    /**
     * @return AbcQuery
     */
    public function active() :AbcQuery
    {
        return $this->andWhere(['open' => true]);
    }

    /**
     * {@inheritdoc}
     * @return Abc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Abc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
