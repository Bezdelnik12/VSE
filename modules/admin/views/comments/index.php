<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Коментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            'body:ntext',
            [
                'attribute' => 'post_id',
                'format' => 'raw',
                'value' => function($data) {
                    return \app\models\Posts::findOne($data->post_id)->title;
                }
            ],
            //'parents_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
