<?php
namespace rest\versions\v1\controllers;

use common\models\Abc;


/**
 * Class AbcController
 * @package rest\versions\v1\controllers
 */
class AbcController extends AbstractController
{
    public function actionIndex()
    {
        return Abc::find()
            ->orderBy(['title' => SORT_ASC])
            ->all();
    }

    public function actionView($id)
    {
        return Abc::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
