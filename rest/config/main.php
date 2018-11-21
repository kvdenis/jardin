<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'rest-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'rest\versions\v1\RestModule'
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/post', 'v1/comment', 'v2/post']],

                'GET v1/news' => 'v1/news/index',
                'GET v1/news/<id>' => 'v1/news/view',

                'GET v1/video' => 'v1/video/index',

                'GET v1/coffee' => 'v1/coffee/index',

                'GET v1/radio' => 'v1/radio/index',

                'GET v1/abc' => 'v1/abc/index',

                'GET v1/titles' => 'v1/titles/index',

                'GET v1/slider' => 'v1/slider/index',

                'GET v1/coffee-text' => 'v1/coffee-text/index',
            ],
        ],
    ],
    'params' => $params,
];
