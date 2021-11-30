<?php

namespace app\models;

use yii\base\Model;

class RegForm extends Model
{
    public $login;
    public $password;
    public $password2;
    public $email;
    public $nickname;

    public function rules()
    {
        return [
            [['login', 'password', 'password2', 'email', 'nickname'], 'required'],
            [['login', 'password', 'password2', 'email', 'nickname'], 'trim'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
            ['nickname', 'string', 'length' => [3, 20]],
            ['password', 'string', 'length' => [6, 20]],
            ['login', 'string', 'length' => [3, 20]],
            ['login', 'validateLogin'],
            ['email', 'validateEmail'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'email' => 'E-Mail',
            'nickname' => 'Имя пользователя',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль'
        ];
    }

    public function validateLogin($attribute, $params)
    {
        $user = Users::findOne(['login' => $this->login]);
        if ($user) $this->addError($attribute, 'Логин уже занят');
    }

    public function validateEmail($attribute, $params)
    {
        $user = Users::findOne(['email' => $this->email]);
        if ($user) $this->addError($attribute, 'E-Mail уже занят');
    }

    public function reg()
    {
        $user = new Users();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->nickname = $this->nickname;
        $user->user_group = 0;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->save();
    }
}