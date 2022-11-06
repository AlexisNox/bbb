<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password_hash
 * @property string|null $access_token
 * @property int|null $created_at
 * @property int|null $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password_hash'], 'required'],
            [['created_at', 'role'], 'integer'],
            [['login', 'password_hash', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password_hash' => 'Password Hash',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
            'role' => 'Role',
        ];
    }
    public function generateAuthKey(){
        return Yii::$app->security->generateRandomString(255);
    }

    public function setPassword($password){
        return Yii::$app->security->generatePasswordHash($password);
    }
}
