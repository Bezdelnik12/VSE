<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Записи', ['delete', 'id' => $model->id], [
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
            'title',
            [
                'attribute' => 'create_date',
                'format' => 'raw',
                'value' => function($data) {
                    return date('d.m.Y H:i:s', $data->create_date);
                }
            ],
            [
                'attribute' => 'autor_id',
                'format' => 'raw',
                'value' => function($data) {
                    return \app\models\Users::findOne($data->autor_id)->nickname;
                }
            ],
            'images',
            [
                'attribute' => 'categories_id',
                'format' => 'raw',
                'value' => function($data) {
                    return \app\models\Categories::findOne($data->categories_id)->title;
                }
            ],
        ],
    ]) ?>

</div>
