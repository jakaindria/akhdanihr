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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/bootstrap/dist/css/bootstrap.min.css',
        'assets/font-awesome/css/font-awesome.min.css',
        'assets/nprogress/nprogress.min.css',
        'assets/animate.css/animate.min.css',
        'assets/pnotify/dist/pnotify.css',
        'assets/pnotify/dist/pnotify.buttons.css',
        'assets/pnotify/dist/pnotify.nonblock.css',
        'assets/gantalella/css/custom.min.css',
    ];
    public $js = [
        /*'assets/jquery/dist/jquery.min.js',
        'assets/bootstrap/dist/js/bootstrap.min.js',*/
        'assets/pnotify/dist/pnotify.js',
        'assets/pnotify/dist/pnotify.buttons.js',
    ];
    public $depends = [
        'app\assets\RequiredAsset',
        /*'yii\web\YiiAsset',*/
        /*'yii\bootstrap\BootstrapAsset',*/
    ];
}
