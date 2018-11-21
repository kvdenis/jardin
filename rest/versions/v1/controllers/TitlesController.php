<?php
namespace rest\versions\v1\controllers;

use common\models\Titles;


/**
 * Class TitlesController
 * @package rest\versions\v1\controllers
 */
class TitlesController extends AbstractController
{
    public function actionIndex()
    {
        return Titles::find()->all();
    }
}
