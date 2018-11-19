<?php
namespace rest\versions\v1\controllers;

use common\models\Radio;
use Yii;
use yii\rest\Controller;


/**
 * Class RadioController
 * @package rest\versions\v1\controllers
 */
class RadioController extends Controller
{
    public function actionIndex()
    {
        return Radio::find()->all();
    }
}
