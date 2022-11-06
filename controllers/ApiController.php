<?php
namespace app\controllers;
use Codeception\Util\Debug;
use Yii;
use yii\db\Query;
use yii\rest\Controller;
use app\models\User;

class ApiController extends Controller{
    public function actionDeleteUser(){
    $id = Yii::$app->request->get('id');
    (new Query) ->createCommand()->delete("users", ['ID' => $id])->execute();

    }
    public function actionUpdateUser(){
        $a = Yii::$app->request->get('a');
        $user = new User();
        $id = $a[2];
        $password = $user->setPassword($a[1]);
        (new Query) ->createCommand()->update('users', ['login' => $a[0], 'password_hash'=> $password], ['id' => $id])->execute();
    }
    public function actionShowUser(){
        $user = (new Query())->from('users')->where(['not like', 'role', 1])->all();
        return $user;

    }
    public function actionInsertUser() {

        $a = Yii::$app->request->get('a');
        $user = new User();
        $login = $a[0];
        $password = $user->setPassword($a[1]);
        $token = $user->generateAuthKey();
        (new Query) ->createCommand()->batchInsert('users', ['login', 'password_hash', 'access_token'], [
            [$login, $password, $token]
        ])->execute();
    }
    public function actionGetData()  {
        $id = Yii::$app->request->get('id');
        $user = (new Query())->from('users')->where(['id' => $id])->one();
        return $user;
    }
    // public function actionLogin() {
    //     $a = Yii::$app->request->get('a');
    //     $user = new User();
    //     $login = $a[0];
    //     // $password = $user->setPassword($a[1]);
    //     $is_user = (new Query())->from('users')->where(['login' => $login])->all();
    //     $result =  $is_user;
    //     return $result;
    // }
}