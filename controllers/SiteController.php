<?php

namespace app\controllers;

use app\models\MyLoginForm;
use app\models\MyNoteForm;
use app\models\MySearchForm;
use app\models\MySignUpForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\helpers\Url;
use app\controllers\UserController;
use app\models\Note;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'login', 'signup', 'note', 'showNote'],
                'rules' => [
                    [
                        'actions' => ['logout', 'note', 'showNote'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
//                    'login' => ['post'],
//                    'signup' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
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
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSearch()
    {
        if (!Yii::$app->user->isGuest)
        {
           $search_model = new MySearchForm();

            if($search_model->load(Yii::$app->request->post()))
            {
                $notes = $search_model->search();
                if ($notes)
                {
                    $title = 'Результаты поиска';
                    return $this->render('my_show_note', compact('notes', 'title'));
                }
                else
                {
                    Yii::$app->session->setFlash('not_found', 'Поиск не дал результатов :(');
                }

            }

        return $this->render('my_search', compact('search_model'));
        }

    }


    public function actionNote()
    {
        if (Yii::$app->user->isGuest) {return $this->redirect(Url::to(['site/login']));}
        $note_model = new MyNoteForm();

        if(Yii::$app->request->post('MyNoteForm'))
        {
            $note_model->attributes = Yii::$app->request->post('MyNoteForm'); // сохраним через load - не заработало

            if ($note_model->validate() && $note_model->create_note()) // сохраним через load - не заработало

//            так что-то не работает ((( :
//            if ($note_model->validate() && $note_model->load(Yii::$app->request->post('MyNoteForm')))

                {
                    Yii::$app->session->setFlash('successfuly', 'Заметка успешно добавлена');
                    return $this->refresh();
                }
        }

        return $this->render('my_note', compact('note_model'));
    }


    public function actionShowNote()
    {
        if(!Yii::$app->user->isGuest)
        {

        $user_id = Yii::$app->user->identity['id'];

        $model = User::findOne($user_id);

        $notes = $model->note;


        $title = 'Мои заметки';

        return $this->render('my_show_note', compact('notes', 'title'));

        }
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
        public function actionLogin()
//        {
//            if (!Yii::$app->user->isGuest) {return $this->goHome();}
//
//
//            $login_model = new MyLoginForm();
//
//            if(Yii::$app->request->post('MyLoginForm'))
//            {
//                $login_model-> attributes = Yii::$app->request->post('MyLoginForm');
//
//
//                if($login_model -> validate())
//                {
//                    Yii::$app->user->login(User::findOne(['user_name'=>$login_model->user_name]));
//                    return $this->goBack();
//                }
//            }
//
//            return $this->render('my_login', compact('login_model'));
//        }


    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new MyLoginForm();

        if ($login_model->load(Yii::$app->request->post()) && $login_model->login())
        {
            return $this->goBack();
        }

        return $this->render('my_login', compact('login_model'));
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();


//        return $this->goHome();
        return $this->redirect(Url::to(['site/login']));

    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Registration page.
     *
     * @return Response|string
     */
    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {return $this->goHome();}


        $signup_model = new MySignUpForm();

        if(Yii::$app->request->post('MySignUpForm'))
        {
//            var_dump(Yii::$app->request->post('MySignUpForm')); die(); //debug

            $signup_model->attributes = Yii::$app->request->post('MySignUpForm');

            if ($signup_model->validate() && $signup_model->signup_user())
            {
//                $signup_model->login_after_signup(); // авторизация после регистрации - не работает пока
                return $this -> goHome();
            }
        }

        return $this->render('my_signup', compact('signup_model'));
    }


}





/**
 * Login action.
 *
 * @return Response|string
 */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//
//        $model->password = '';
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }

function var_print($a)
{
    echo '<pre>'. print_r($a, true) . '</pre>';
    die();
}