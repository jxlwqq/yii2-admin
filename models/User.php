<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;

    public function init(){

//        $this->id = $this->id;
//        $this->username = $this->username;
//        $this->password = $this->password_hash;
//        $this->authKey = $this->auth_key;
//        $this->accessToken = $this->password_reset_token;
    }



    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne($id);
    }


    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
        return static::findOne(['access_token' => $token]);
//        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $user = User::find()
            ->where(['username' => $username])
            ->asArray()
            ->one();
        if($user) return new static($user);
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
//         \Yii::$app->getSecurity()->generatePasswordHash($password);//生成密码HASH

        return \Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);//校验hash密码
    }
}
