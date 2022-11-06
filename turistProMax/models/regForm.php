<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Problem[] $problems
 */
class regForm extends User
{
    public $passwordConfirm;
    public $agree;
    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required', 'message'=>'gjkt lkz pfgjkytybz'],
             ['login', 'match', 'pattern'=> '/^[a-z A-Z]{1,}$/u', 'message'=>'bucvi'],
            ['login', 'unique', 'message'=>'pleas working message'],
            ['email', 'email', 'message'=>'dont correct message'],
            ['passwordConfirm', 'compare', 'compareAttribute'=>'password', 'message'=> 'dont vait parrol'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'lock you cheack box'],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Фио',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'admin' => 'Admin',
            'passwordConfirm' => 'update',
            'agree' => 'soglasie',
        ];
    }


}
