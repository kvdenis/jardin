<?php
namespace rest\versions\v1\controllers;

use rest\models\AbcSearch;
use Yii;
use yii\rest\Controller;


/**
 * Class AbcController
 * @package rest\versions\v1\controllers
 */
class AbcController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new AbcSearch();

        $searchModel->load(Yii::$app->request->queryParams, '');

        $dataProvider = $searchModel->search([]);

        return [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->getPagination(),
        ];
    }
}
