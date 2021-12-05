<?php

namespace app\controllers;

use app\models\Categories;
use app\models\CommentForm;
use app\models\Comments;
use app\models\Pages;
use app\models\Posts;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

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
        $query = Posts::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy([
                'create_date' => SORT_DESC
            ])
            ->all();
        $category = false;
        return $this->render('index', compact('posts', 'pages', 'category'));
    }

    public function actionCategory($id)
    {
        $category = Categories::findOne($id);
        if (!$category) throw new NotFoundHttpException('Страница не найдена.');

        $query = Posts::find()->where(['categories_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy([
                'create_date' => SORT_DESC
            ])
            ->all();
        return $this->render('index', compact('posts', 'pages', 'category'));
    }

    public function actionPost($id, $author_id)
    {
        $post = Posts::findOne(['id' => $id, 'autor_id' => $author_id]);
        if (!$post) throw new NotFoundHttpException('Страница не найдена.');

        $query = Comments::find()->where(['post_id' => $post->id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $comments = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $form_comment = new CommentForm();
        $form_comment->parents_id = 0;
        if ($form_comment->load(Yii::$app->request->post()) && $form_comment->validate() && $form_comment->com($post->id, Yii::$app->user->identity->id)) {
            Yii::$app->session->setFlash('success', 'Коментарий сохранен');
            return $this->redirect('/post' . $post->autor_id . '_' . $post->id);
        }

        return $this->render('post', compact('post', 'comments', 'form_comment', 'pages'));
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
            return $this->redirect('/');
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
        return $this->render('page', [
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
                echo '<meta http-equiv="refresh" content="0; URL=/login">';
                return $this->redirect('/login');
            }
        }

        return $this->render('reg', [
            'model' => $model,
        ]);
    }
}
