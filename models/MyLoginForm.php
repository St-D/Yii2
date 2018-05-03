<?php

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\User;


class MyLoginForm extends Model
{
    public $user_name;
    public $password;

    public $remember_me = true;

    private $_user = false;

    public function attributeLabels()
    {
        return[
            'user_name' => 'Имя',
            'password' => 'Пароль',
        ];
    }

    public function rules()
    {
        return[
            [['user_name', 'password'], 'required'],
            ['password', 'string', 'min' => 2, 'max' => 12 ],
            ['user_name', 'string', 'min' => 2, 'max' => 12 ],
            ['remember_me', 'boolean'],
            ['password', 'validatePass'],
        ];
    }


    public function validatePass($attribute)
    {
//        $who_user = User::findOne(['user_name'=>$this->user_name]);
        $who_user = $this->getUser();

        if(!$who_user || ($who_user->pas_md5 != sha1($this -> password)))
        {
            $this -> addError($attribute, 'Пара логин-пароль не совпадает');
        }
    }


    public function login()
    {
        if ($this->validate())
        {
//            $this->setUserStatus($this->user_name, 1);

            if ($this->remember_me)
            {
                $get_u = $this->getUser();
                $get_u->createAuthKey();
                $get_u->save();
            }

            return Yii::$app->user->login($this->getUser(), $this->remember_me ? 3600*24*30 : 0);
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
//            $this->_user = User::findByUsername($this->user_name);
            $this->_user = User::findOne(['user_name'=>$this->user_name]);
        }

        return $this->_user;
    }


//    public function setUserStatus($name, $status) // не используется, не ясно как менять статус по тайм-ауту Cook
//        /*
//         *  0 - ofline
//         *  1 - online
//         *  .
//         *  .
//         *  20 - ban (for example)
//         */
//    {
//        if (!Yii::$app->user->isGuest)
//        {
//            $user_query = User::findOne(['user_name'=>$name]);
//            $user_query->online_status = $status;
//
////            if(!$user_query->save()) {
////                var_dump($user_query->getErrors());
////                die();
////            }
//
//            $user_query->save();
//        }
//    }

}