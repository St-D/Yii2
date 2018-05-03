<?php


namespace app\models;
use yii\base\Model;


class MySignUpForm extends Model
{
    public $name;
    public $email;
    public $pas;

    public function attributeLabels()
    {
        return[
            'name' => 'Имя',
            'email' => 'Почт@',
            'pas' => 'Пароль',
        ];
    }

    public function rules()
    {
        return[
            [['name', 'email', 'pas'], 'required'],
            ['name', 'string', 'min' => 2, 'max' => 12 ],
            ['email', 'email'],
            ['name', 'unique', 'targetClass' => 'app\models\User',  'targetAttribute' => 'user_name'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['pas', 'string', 'min' => 2, 'max' => 12 ],
        ];
    }


    public function signup_user()
    {
        $create_user = new User();

        $create_user->user_name = $this->name;
        $create_user->reg_date =  date("Y-m-d");
        $create_user->email =  $this->email;
        $create_user->pas_md5 =  sha1($this->pas);

        return $create_user -> save();
    }


    public function login_after_signup() //авторизайия после регистрации - пока не рабоатет
    {
        $login_form = new MyLoginForm();

        $login_form->user_name = $this->name;
        $login_form->password = $this->pas;

        $login_form -> login();
    }

}