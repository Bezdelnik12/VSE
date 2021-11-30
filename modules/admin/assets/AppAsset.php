<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/administrator/assets/libs/chartist/dist/chartist.min.css',
        '/administrator/dist/js/pages/chartist/chartist-init.css',
        '/administrator/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css',
        '/administrator/assets/libs/c3/c3.min.css',
        '/administrator/dist/css/style.min.css'
    ];
    public $js = [
        '/administrator/assets/libs/popper.js/dist/umd/popper.min.js',
        '/administrator/assets/libs/bootstrap/dist/js/bootstrap.min.js',
        '/administrator/dist/js/app.min.js',
        '/administrator/dist/js/app.init.js',
        '/administrator/dist/js/app-style-switcher.js',
        '/administrator/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js',
        '/administrator/assets/extra-libs/sparkline/sparkline.js',
        '/administrator/dist/js/waves.js',
        '/administrator/dist/js/sidebarmenu.js',
        '/administrator/dist/js/custom.min.js',
        '/administrator/assets/libs/chartist/dist/chartist.min.js',
        '/administrator/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',
        '/administrator/assets/libs/d3/dist/d3.min.js',
        '/administrator/assets/libs/c3/c3.min.js',
        '/administrator/dist/js/pages/dashboards/dashboard1.js',
        '/administrator/tinymce/tinymce.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
    ];
}