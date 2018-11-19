<?php
namespace rest\versions\v1\controllers;

use common\models\News;
use common\models\Video;
use yii\rest\Controller;


/**
 * Class VideoController
 * @package rest\versions\v1\controllers
 */
class VideoController extends Controller
{
    public function actionIndex()
    {
        return Video::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }
}
