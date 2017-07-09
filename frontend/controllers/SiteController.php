<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;
use yii\Faker\Factory;
use common\components\AuthHandler;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        //'actions' => ['logout'],
                        'actions' => ['logout', 'index','generate'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

        ];
    }



    public $successUrl = ''; //bikin variabel successUrl
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
                'successUrl' => $this->successUrl
            ],
        ];
    }



    public function successCallback($client)
    {

        $attributes = $client->getUserAttributes();

        /** --remark

        // user login or signup comes here
        /*
        Kalo di die(print_r($attributes));
        maka akan keluar
        Array ( [id] => https://www.google.com/accounts/o8/id?id=AItOawkSN3ecyrQAUOVyy9kuX-2oq-hahagake [namePerson/first] => Hafid [namePerson/last] => Mukhlasin [pref/language] => en [contact/email] => milisstudio@gmail.com [first_name] => Hafid [last_name] => Mukhlasin [email] => milisstudio@gmail.com [language] => en ) 


        Array ( [kind] => plus#person [etag] => "Sh4n9u6EtD24TM0RmWv7jTXojqc/bG_fyyI5N7rWZ7pKBInfGsp6MEs" [gender] => male [emails] => Array ( [0] => Array ( [value] => oktofianuskanni@gmail.com [type] => account ) ) [objectType] => person [id] => 101505136064094466196 [displayName] => Oktofianus Kanni [name] => Array ( [familyName] => Kanni [givenName] => Oktofianus ) [url] => https://plus.google.com/+OktofianusKanni [image] => Array ( [url] => https://lh5.googleusercontent.com/-xI83dF7kCyM/AAAAAAAAAAI/AAAAAAAAGJU/vLKb0KjjTok/photo.jpg?sz=50 [isDefault] => ) [isPlusUser] => 1 [language] => en_GB [circledByCount] => 23 [verified] => [cover] => Array ( [layout] => banner [coverPhoto] => Array ( [url] => https://lh3.googleusercontent.com/JSpbubSZ6MbMiB2qAmPoRDYIdjzVk0RuTdArT5E5vS3g9XFn39Av4RPiXi2H-CsWXKRfv1NI4tRS=s630-fcrop64=1,206a2e9cdf1ad0ab [height] => 624 [width] => 940 ) [coverInfo] => Array ( [topImageOffset] => 0 [leftImageOffset] => 0 ) ) ) 1


     
        Nah data ini bisa kita gunakan untuk check apakah si user udah terdaftar ato belum..
        *
*/



/*

        $attributes = $client->getUserAttributes();

        $user = \common\models\User::find()
        ->where(['email'=>$attributes['emails'],])->one();
        if(!empty($user)){
            Yii::$app->user->login($user);
        }
        else{

            //die(print_r($attributes));
            //Simpen disession attribute user dari Google
            $session = Yii::$app->session;
            $session['attributes']=$attributes;

            //$model->username = $session['attributes']['first_name'];
            //$model->email = $session['attributes']['emails'];

            //die(print_r($model->email));
            //die(print_r($session['attributes']));
            //exit();
            // redirect ke form signup, dengan mengset nilai variabell global successUrl
            $this->successUrl = \yii\helpers\Url::to(['signup']);
            //$this->redirect(['signup']);

        }
*/



/*               $email = \Yii::$app->mailer->compose()
                ->setTo('oktofianuskanni@gmail.com')
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                ->setSubject('Signup Confirmation')
                ->setTextBody($attributes['emails'])
                ->send();
*/

        //die(print_r($attributes));
        //die(print_r($attributes['emails']['value']));
        //echo $var[0]['value']
        //print_r (str_replace('Array', '', ($attributes['emails'])));

        // outputnya google: Array ( [0] => Array ( [value] => oktofianuskanni@gmail.com [type] => account ) ) 1

         //$attributes = $client->getUserAttributes();
        // $dataku=$attributes['emails'];
        // die(print_r($dataku[0]['value']));
        



        //die(print_r($attributes));
        //die(print_r($attributes['emails']));



        (new AuthHandler($client))->handle();
    }



    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //return $this->render('index');
        return $this->redirect(['beritas/index']);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //echo Yii::$app->params['adminEmail'];

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                //echo $model->name.'<br>';
                //echo $model->email.'<br>';
                //echo $model->subject.'<br>';
                //echo $model->body.'<br>';
                //exit();
                $email = \Yii::$app->mailer->compose()
                ->setTo('oktofianuskanni@gmail.com')
                ->setFrom([\Yii::$app->params['supportEmail'] => $model->email])
                ->setSubject($model->subject)
                ->setTextBody($model->body)
                ->send();

                Yii::$app->session->setFlash('success', 'Terima kasih telah menghubungi kami. Akan kami respon secepatnya.');

            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

   public function actionSignup()
    {


        //die(print_r($attributes['emails']));
        //exit();



        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $email = \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                ->setSubject('Signup Confirmation')

                ->setTextBody("Klik link berikut ini untuk aktivasi account anda di: ".Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$user->id,'key'=>$user->auth_key]))
                ->send();




                //exit();

                    if($email){
                        Yii::$app->getSession()->setFlash('success','Kami telah mengirim email untuk aktivasi account. Silahkan cek email anda!');
                    }
                    else{
                        Yii::$app->getSession()->setFlash('warning','Error, Hubungi admin!');
                    }
                        return $this->goHome();
                    }
            }
         
        return $this->render('signup', [
            'model' => $model,
        ]);
    }








    public function actionConfirm($id, $key)
    {
        //echo $id." & ".$key;
        //exit();
        $user = \common\models\User::find()->where([
            'id'=>$id,
            'auth_key'=>$key,
            'status'=>0,
            ])->one();
        if(!empty($user)){
            $user->status=10;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Aktivasi Account Anda Success! Silahkan Login');
        }
        
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!');
        }
        return $this->goHome();
    }







    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {


        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                //exit();
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }


        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }



    public function actionGenerate($row=10,$iterate=1){
        $start = microtime(true);
        $faker = Faker\Factory::create();
        $datas = [];
        for($j=1;$j<=$iterate;$j++){
            for($i=1;$i<=$row;$i++){                                     
                $datas[$i]=[$faker->name,rand(0,1),$faker->dateTimeThisCentury->format('Y-m-d'),$faker->email,$faker->phoneNumber,$faker->streetAddress];
            }   
            \Yii::$app->db->createCommand()->batchInsert('employee', ['name', 'gender', 'born', 'email', 'phone', 'address'], $datas)->execute();
        }   
         
        $time_elapsed_us = microtime(true) - $start;
        echo ($row*$iterate).' = '.$time_elapsed_us.' <br>';
    }


    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
