<?php

namespace app\modules\admin\controllers;

use app\models\Posts;
use app\modules\admin\models\PostsForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Posts::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();
        $model->autor_id = \Yii::$app->user->identity->id;
        $model->create_date = time();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $form = new PostsForm();

        $form->id = $model->id;
        $form->autor_id = $model->autor_id;

        if ($this->request->isPost) {
            if ($form->load($this->request->post())) {
                $form->imageFile = UploadedFile::getInstance($form, 'imageFile');
                $image = $form->upload($model);
                if ($image) $model->images = $image;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $form->title = $model->title;
            $form->body = $model->body;
            $form->desc = $model->desc;
            $form->categories_id = $model->categories_id;
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
