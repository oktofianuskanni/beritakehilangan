<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $nama_lengkap;
    public $mobile_handphone;
    public $telephone;
    public $pin_bb;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

        
            ['nama_lengkap', 'trim'],
            //['nama_lengkap', 'required'],

            
            ['mobile_handphone', 'trim'],
            //['mobile_handphone', 'required'],


            ['telephone', 'trim'],
            //['telephone', 'required'],  


            ['pin_bb', 'trim'],
            //['pin_bb', 'required'],     


            ['username', 'trim'],
            //['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required'],
            //['password_repeat', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false, 'message'=>"Password anda tidak sama"],
            ];

    }



    public function attributeLabels()
    {
        return [
            'nama_lengkap' => 'Nama Lengkap *',
            'mobile_handphone' => 'Handphone *',
            'username' => 'Username *',
            'password' => 'Password *',
            'password_repeat' => 'Confirm Password *',

            'email' => 'Email *',
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
     public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        /*

        //$user->status = 'Enable';*/

        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->nama_lengkap = $this->nama_lengkap;
        $user->mobile_handphone = $this->mobile_handphone;
        $user->telephone = $this->telephone;
        $user->pin_bb = $this->pin_bb;
        $user->status = 0; 
        if ($user->save()) { 
            return $user; 
        }

        return null;

        //return $user->save() ? $user : null;
    }



    
}
