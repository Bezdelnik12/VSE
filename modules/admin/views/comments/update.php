<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Коментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
