<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Password]].
 *
 * @see Password
 */
class PasswordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Password[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Password|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
