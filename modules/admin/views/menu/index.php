<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $menu array */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пункт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <ul>
        <?= showCat(getTree($menu), true, false) ?>
    </ul>


</div>
