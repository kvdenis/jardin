<?php
namespace rest\versions\v1\controllers;

use common\models\CoffeeText;

/**
 * Class CoffeeTextController
 * @package rest\versions\v1\controllers
 */
class CoffeeTextController extends AbstractController
{
    public function actionIndex()
    {
        return CoffeeText::find()->one();
    }
}
