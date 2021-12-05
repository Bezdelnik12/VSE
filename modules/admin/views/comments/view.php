<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Коментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function($data) {
                    return \app\models\Users::findOne($data->user_id)->nickname;
                }
            ],
            [
                'attribute' => 'create_date',
                'format' => 'raw',
                'value' => function($data) {
                    return date('d.m.Y H:i:s', $data->create_date);
                }
            ],
            [
                'attribute' => 'body',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->body;
                }
            ],
            [
                'attribute' => 'post_id',
                'format' => 'raw',
                'value' => function($data) {
                    return \app\models\Posts::findOne($data->post_id)->title;
                }
            ],
        ],
    ]) ?>

</div>
