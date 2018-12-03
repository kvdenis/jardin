<?php
namespace rest\versions\v1\controllers;

use common\models\Log;
use Yii;


/**
 * Class LogController
 * @package rest\versions\v1\controllers
 */
class LogController extends AbstractController
{
    public function actionCreate()
    {
        $model = new Log();

        $model->load(Yii::$app->request->get(), '');

        $model->load(Yii::$app->request->post(), '');

        $model->createdAt = time();

        $model->save();

        return $model;
    }
}
