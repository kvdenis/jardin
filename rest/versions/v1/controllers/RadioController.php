<?php
namespace rest\versions\v1\controllers;

use common\models\Radio;


/**
 * Class RadioController
 * @package rest\versions\v1\controllers
 */
class RadioController extends AbstractController
{
    public function actionIndex()
    {
        return Radio::find()->all();
    }
}
