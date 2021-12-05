<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */

$categories = \app\models\Categories::find()->all();
$item = \yii\helpers\ArrayHelper::map($categories, 'id', 'title');
?>
<div class="posts-form">

    <?php $form = ActiveForm::begin([
            'options' => [
                    'enctype' => 'multipart/form-data'
            ]
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'categories_id')->dropDownList($item, ['prompt' => 'Выбирите категорию']) ?>

    <?php if ($model->id): ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php else: ?>
    <p>Добавить изображение на статью можно только после её создания</p>
    <?php endif ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
