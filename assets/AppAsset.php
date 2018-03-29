<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
        'assets/bootstrap/dist/css/bootstrap.min.css',
//        'assets/datatables.net-bs/css/jquery.dataTables.min.css',
//        'assets/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'assets/font-awesome/css/font-awesome.min.css',
        'assets/nprogress/nprogress.min.css',
        'assets/iCheck/skins/flat/green.min.css',
        'assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'assets/bootstrap-daterangepicker/daterangepicker.min.css',
        'assets/pnotify/dist/pnotify.css',
        'assets/pnotify/dist/pnotify.buttons.css',
        'assets/pnotify/dist/pnotify.nonblock.css',
        'assets/site.min.css',
        'assets/gantalella/css/custom.min.css',
        'assets/style.css',
    ];
    public $js = [
//        'assets/jquery/dist/jquery.min.js',
//        'assets/bootstrap/dist/js/bootstrap.min.js',
//        'assets/datatables.net-bs/js/jquery.dataTables.min.js',
//        'assets/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'assets/fastclick/lib/fastclick.min.js',
        'assets/nprogress/nprogress.min.js',
        'assets/bootstrap-progressbar/bootstrap-progressbar.min.js',
        'assets/DateJS/build/production/date.min.js',
        'assets/moment/moment.min.js',
        'assets/bootstrap-daterangepicker/daterangepicker.min.js',
        'assets/pnotify/dist/pnotify.js',
        'assets/pnotify/dist/pnotify.buttons.js',
        'assets/gantalella/js/custom.min.js',
    ];
    public $depends = [
        'app\assets\RequiredAsset'
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
