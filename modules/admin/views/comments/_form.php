<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */
/* @var $form yii\widgets\ActiveForm */

$users = \app\models\Users::find()->all();
$item = \yii\helpers\ArrayHelper::map($users, 'id', 'nickname');

$posts = \app\models\Posts::find()->all();
$item2 = \yii\helpers\ArrayHelper::map($posts, 'id', 'title');
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($item) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_id')->dropDownList($item2) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
