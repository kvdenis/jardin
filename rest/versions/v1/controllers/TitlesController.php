<?php
namespace rest\versions\v1\controllers;

use common\models\Titles;
use yii\rest\Controller;


/**
 * Class TitlesController
 * @package rest\versions\v1\controllers
 */
class TitlesController extends Controller
{
    public function actionIndex()
    {
        return Titles::find()->all();
    }
}
