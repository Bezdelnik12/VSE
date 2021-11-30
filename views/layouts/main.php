<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\models\Menu;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$menu = \app\models\Menu::find()->asArray()->all();
$data = [];
foreach ($menu as $item) {
    $data[$item['id']] = $item;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .navbar-light li a {
            color: rgba(0,0,0,.5);
        }
        .navbar-light li.active>a {
            color: rgba(0,0,0,.9);
        }
        .invalid-feedback {
            display:block;
        }
    </style>
</head>
<body class="d-flex flex-column h-100" ">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => array(
            'class' => 'navbar navbar-expand-lg navbar-light bg-light',
        ),
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto navbar-right'],
        'items' => [
            !Yii::$app->user->isGuest && (
                    Yii::$app->user->identity->user_group  == '1' ||
                    Yii::$app->user->identity->user_group  == '2'
            ) ? (['label'=>'Панель администратора', 'url'=> ['/admin']]):'',
            (!defined('NO_REG') || !NO_REG) && Yii::$app->user->isGuest ? (['label'=>'Регистрация', 'url'=> ['/site/reg']]):'',
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                    ['label' => 'Выйти', 'url' => ['/site/logout']]
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-8">
                <?= $content ?>
            </div>
            <div class="col-md-4">
                <ul>
                    <?= showCat(getTree($data), false) ?>
                </ul>
            </div>
        </div>
    </div>
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
