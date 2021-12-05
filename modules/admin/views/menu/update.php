<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $menu array */

$this->title = 'Изменить пункт: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'menu' => $menu
    ]) ?>

</div>
