<?php

namespace app\controllers;

use app\models\Pages;
use app\models\Posts;
use Codeception\PHPUnit\Constraint\Page;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @throws Yii\web\NotFoundHttpException
     */
    public function actionPage()
    {
        $id = Yii::$app->request->get('p');
        $post = Pages::findOne(['id' => $id]);
        if (!$post) throw new \yii\web\NotFoundHttpException();
        return $this->render('post', [
            'post' => $post,
        ]);
    }

    public function actionReg()
    {
        if (!Yii::$app->user->isGuest || (defined('NO_REG') && NO_REG)) {
            return $this->goHome();
        }
        $model = new \app\models\RegForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->reg()) {
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались');
                return $this->goHome();;
            }
        }

        return $this->render('reg', [
            'model' => $model,
        ]);
    }
}
