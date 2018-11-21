<?php
namespace rest\versions\v1\controllers;

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
}
