<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записи';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запиь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            //'desc',
            //'images',
            //'categories_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
