<?php

namespace rest\versions\v1\controllers;


use Yii;
use yii\rest\Controller;
use yii\web\Response;

abstract class AbstractController extends Controller
{

    public function afterAction($action, $result)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return parent::afterAction($action, $result);
    }
}