<?php
namespace rest\versions\v1\controllers;

use common\models\News;

/**
 * Class NewsController
 * @package rest\versions\v1\controllers
 */
class NewsController extends AbstractController
{
    public function actionIndex()
    {
        return News::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(7)
            ->all();
    }
}
