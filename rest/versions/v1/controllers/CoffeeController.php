<?php
namespace rest\versions\v1\controllers;

use common\models\Coffee;
use rest\models\CoffeeSearch;
use Yii;

/**
 * Class CoffeeController
 * @package rest\versions\v1\controllers
 */
class CoffeeController extends AbstractController
{
    public function actionIndex()
    {
        $searchModel = new CoffeeSearch();

        $searchModel->load(Yii::$app->request->queryParams, '');

        $dataProvider = $searchModel->search([]);

        return [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->getPagination(),
        ];
    }

    public function actionView($id)
    {
        return Coffee::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
