<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="site-reg">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password2')->passwordInput() ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'nickname') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
