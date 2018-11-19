<?php
namespace rest\versions\v1\controllers;

use common\models\CoffeeText;
use yii\rest\Controller;


/**
 * Class CoffeeTextController
 * @package rest\versions\v1\controllers
 */
class CoffeeTextController extends Controller
{
    public function actionIndex()
    {
        return CoffeeText::find()->one();
    }
}
