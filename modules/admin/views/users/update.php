<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $__u_token string */
/* @var $model app\models\Users */

$this->title = 'Обновить пользователя: ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->login, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';

$model->password = '';
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        '__u_token' => $__u_token,
    ]) ?>

</div>
