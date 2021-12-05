<?php

/** @var $this yii\web\View */
/** @var $posts app\models\Posts */
/** @var $category app\models\Categories */
/** @var $pages yii\data\Pagination */

use app\models\Categories;
use yii\helpers\Url;

$this->title = 'VSE';
if ($category)  $this->title = $category->title;
?>
<style>.vse_mb10{margin-bottom: 10px}</style>
<?php if ($category): ?>
    <h1>Категория: <?= $category->title ?></h1>
<?php endif ?>
<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-md-6 vse_mb10">
            <div class="card">
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
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title ?></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?= Url::to(['site/category', 'id' => $post->categories_id]) ?>"><?= Categories::findOne($post->categories_id)->title ?></a>
                        </div>
                        <div class="col-md-6 text-right">
                            <?= date('d.m.Y H:i:s', $post->create_date) ?>
                        </div>
                    </div>
                    <div class="card-text"><?= $post->desc ?></div>
                    <p class="text-right">
                        <a href="<?= Url::to(['site/post', 'id' => $post->id, 'author_id' => $post->autor_id]) ?>" class="btn btn-primary">Подробнее</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= \yii\bootstrap4\LinkPager::widget([
    'pagination' => $pages,
]); ?>