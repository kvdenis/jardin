<?php
namespace rest\versions\v1\controllers;

use common\models\Slider;


/**
 * Class SliderController
 * @package rest\versions\v1\controllers
 */
class SliderController extends AbstractController
{
    public function actionIndex()
    {
        return Slider::find()->all();
    }
}
