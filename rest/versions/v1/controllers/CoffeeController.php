<?php
namespace rest\versions\v1\controllers;

use common\models\Coffee;
use Yii;

/**
 * Class CoffeeController
 * @package rest\versions\v1\controllers
 */
class CoffeeController extends AbstractController
{
    public function actionIndex()
    {
        return Coffee::find()
            ->orderBy(['id' => SORT_ASC])
            ->all();
    }

    public function actionView($id)
    {
        return Coffee::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
