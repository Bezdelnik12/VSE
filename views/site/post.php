<?php

/* @var $this yii\web\View */
/* @var $post app\models\Posts */
/** @var $pages yii\data\Pagination */
/* @var $comments app\models\Comments */

/* @var $form_comment app\models\CommentForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use app\models\Categories;
use app\models\Comments;
use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $post->title;
?>
<h1><?= $post->title ?></h1>
<div class="row">
    <div class="col-md-6">
        <a href="<?= Url::to(['site/category', 'id' => $post->categories_id]) ?>"><?= Categories::findOne($post->categories_id)->title ?></a>
    </div>
    <div class="col-md-6 text-right">
        <?= date('d.m.Y H:i:s', $post->create_date) ?>
    </div>
</div>
<?php if ($post->images): ?>
    <img src="/uploads/<?= $post->images ?>" alt="<?= $post->title ?>" class="card-img-top"/>
<?php else: ?>
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180"
         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Заглушка изображения"
         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
        <rect width="100%" height="100%" fill="#6c757d"></rect>
        <text x="10%" y="50%" fill="#dee2e6" dy=".3em">Заглушка изображения</text>
    </svg>
<?php endif ?>
<?= $post->body ?>
<hr/>
<h2>Коментарии (<?= Comments::find()->where(['post_id' => $post->id])->count() ?>)</h2>

<?php if (!Yii::$app->user->isGuest): ?>
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($form_comment, 'body')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
<?php endif ?>
<div class="row">
    <?php foreach ($comments as $comment): ?>
        <?php $user = Users::findOne(['id' => $comment->user_id]); ?>
        <div class="card mb-3" style="width: 100%">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($user->email))) ?>?s=400" alt="<?= $user->nickname ?>" class="card-img-top" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user->nickname ?></h5>
                        <div class="card-text"><?= $comment->body ?></div>
                        <p class="card-text"><small
                                    class="text-muted"><?= date('d.m.Y H:i:s', $comment->create_date) ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= LinkPager::widget([
    'pagination' => $pages,
]) ?>