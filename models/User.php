<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $nombre;
    public $apellido;
    public $mail;
    public $password;
    public $authKey;
    public $accessToken;

    /*
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    */

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
        $user = Usuario::find()
                ->where([
                    "id" => $id
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $userType = null) {
 
        $user = Usuario::find()
                ->where(["accessToken" => $token])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $user = Usuario::find()
                ->where([
                    "mail" => $username
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    public static function findByUser($username) {
        $user = Usuario::find()
                ->where([
                    "mail" => $username
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return $user;
    }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
