<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\admin\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" type="image/png" sizes="16x16" href="/administrator/assets/images/favicon.png">
</head>

<body>
<?php $this->beginBody() ?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="/">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        VSE
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">

                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto float-left">
                    <li class="nav-item"> <a
                            class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim(Yii::$app->user->identity->email))) ?>" alt="user" width="30" class="profile-pic rounded-circle" />
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                            <ul class="dropdown-user list-style-none">
                                <li>
                                    <div class="dw-user-box p-3 d-flex">
                                        <div class="u-img"><img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim(Yii::$app->user->identity->email))) ?>" alt="user" width="80" class="rounded"></div>
                                        <div class="u-text ml-2">
                                            <h4 class="mb-0"><?= Yii::$app->user->identity->nickname ?></h4>
                                            <p class="text-muted mb-1 font-14"><?= Yii::$app->user->identity->email ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="dropdown-divider"></li>
                                <li class="user-list"><a class="px-3 py-2" href="/site/logout"><i class="fa fa-power-off"></i> Выход</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/admin/">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">Главная</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-content-copy"></i>
                            <span class="hide-menu">Записи</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item active">
                                <a href="/admin/categories/" class="sidebar-link active">
                                    <span class="hide-menu">Категории</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/admin/posts/" class="sidebar-link">
                                    <span class="hide-menu">Записи</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/admin/comments/" class="sidebar-link">
                                    <span class="hide-menu">Коментарии</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/admin/pages/">
                            <i class="mdi mdi-book"></i>
                            <span class="hide-menu">Страницы</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/admin/menu/">
                            <i class="mdi mdi-widgets"></i>
                            <span class="hide-menu">Меню</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/admin/users/">
                            <i class="mdi mdi-widgets"></i>
                            <span class="hide-menu">Пользователи</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-12 col-12 align-self-center">
                <h3 class="text-themecolor mb-0"><?= Html::encode($this->title) ?></h3>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>
        <div class="container-fluid">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->
<aside class="customizer">
    <!--<a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>-->
    <div class="customizer-body">
        <ul class="nav customizer-tab" role="tablist" >
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="p-3 border-bottom">
                    <!-- Sidebar -->
                    <h5 class="font-medium mb-2 mt-2">Layout Settings</h5>
                    <div class="checkbox checkbox-info mt-3">
                        <input type="checkbox" name="theme-view" class="material-inputs" id="theme-view">
                        <label for="theme-view"> <span>Dark Theme</span> </label>
                    </div>
                    <div class="checkbox checkbox-info mt-2">
                        <input type="checkbox" class="sidebartoggler material-inputs" name="collapssidebar" id="collapssidebar">
                        <label for="collapssidebar"> <span>Collapse Sidebar</span> </label>
                    </div>
                    <div class="checkbox checkbox-info mt-2">
                        <input type="checkbox" name="sidebar-position" class="material-inputs" id="sidebar-position">
                        <label for="sidebar-position"> <span>Fixed Sidebar</span> </label>
                    </div>
                    <div class="checkbox checkbox-info mt-2">
                        <input type="checkbox" name="header-position" class="material-inputs" id="header-position">
                        <label for="header-position"> <span>Fixed Header</span> </label>
                    </div>
                    <div class="checkbox checkbox-info mt-2">
                        <input type="checkbox" name="boxed-layout" class="material-inputs" id="boxed-layout">
                        <label for="boxed-layout"> <span>Boxed Layout</span> </label>
                    </div>
                </div>
                <div class="p-3 border-bottom">
                    <!-- Logo BG -->
                    <h5 class="font-medium mb-2 mt-2">Logo Backgrounds</h5>
                    <ul class="theme-color m-0 p-0">
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin1"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin2"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin3"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin4"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin5"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-logobg="skin6"></a></li>
                    </ul>
                    <!-- Logo BG -->
                </div>
                <div class="p-3 border-bottom">
                    <!-- Navbar BG -->
                    <h5 class="font-medium mb-2 mt-2">Navbar Backgrounds</h5>
                    <ul class="theme-color m-0 p-0">
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin1"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin2"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin3"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin4"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin5"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-navbarbg="skin6"></a></li>
                    </ul>
                    <!-- Navbar BG -->
                </div>
                <div class="p-3 border-bottom">
                    <!-- Logo BG -->
                    <h5 class="font-medium mb-2 mt-2">Sidebar Backgrounds</h5>
                    <ul class="theme-color m-0 p-0">
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin1"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin2"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin3"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin4"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin5"></a></li>
                        <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                                                        data-sidebarbg="skin6"></a></li>
                    </ul>
                    <!-- Logo BG -->
                </div>
            </div>
    </div>
</aside>

<?php $this->endBody() ?>
<script>tinymce.init({selector:'textarea',language:'ru'});</script>
</body>
</html>
<?php $this->endPage() ?>