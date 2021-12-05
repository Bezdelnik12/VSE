<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $menu array */

$this->title = 'Создать пункт меню';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'menu' => $menu
    ]) ?>

</div>
