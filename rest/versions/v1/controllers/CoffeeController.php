<?php
namespace rest\versions\v1\controllers;

use rest\models\CoffeeSearch;
use Yii;
use yii\rest\Controller;


/**
 * Class CoffeeController
 * @package rest\versions\v1\controllers
 */
class CoffeeController extends Controller
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
