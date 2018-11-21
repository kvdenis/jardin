<?php
namespace rest\versions\v1\controllers;

use common\models\Abc;
use rest\models\AbcSearch;
use Yii;


/**
 * Class AbcController
 * @package rest\versions\v1\controllers
 */
class AbcController extends AbstractController
{
    public function actionIndex()
    {
        $searchModel = new AbcSearch();

        $searchModel->load(Yii::$app->request->queryParams, '');

        $dataProvider = $searchModel->search([]);

        $dataProvider->query->limit(1000);

        return $dataProvider->getModels();
    }

    public function actionView($id)
    {
        return Abc::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
