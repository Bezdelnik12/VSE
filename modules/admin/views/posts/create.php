<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Создать запись';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
