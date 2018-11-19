<?php
namespace rest\versions\v1\controllers;

use common\models\News;
use yii\rest\Controller;


/**
 * Class NewsController
 * @package rest\versions\v1\controllers
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        return News::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(7)
            ->all();
    }
}
