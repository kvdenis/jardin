<?php
namespace rest\versions\v1\controllers;

use common\models\Video;
/**
 * Class VideoController
 * @package rest\versions\v1\controllers
 */
class VideoController extends AbstractController
{
    public function actionIndex()
    {
        return Video::find()
            ->active()
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }
}
