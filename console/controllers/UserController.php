<?php
namespace console\controllers;

use common\models\User;
use yii\console\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionAdd($username, $password)
    {
        $user = new User();

        $user->username = $username;

        $user->setPassword($password);

        $user->generateAuthKey();

        $user->save(false);

        var_dump($user->getErrors());
    }

    /**
     * @param $id
     * @param $password
     * @throws NotFoundHttpException
     * @throws \yii\base\Exception
     */
    public function actionChangePassword($id, $password)
    {
        /** @var User $user */
        $user = User::findOne($id);

        if (!$user) {
            throw new NotFoundHttpException;
        }

        $user->setPassword($password);

        $user->save(false);
    }
}