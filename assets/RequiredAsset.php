<?php
    /**
     * @link http://www.yiiframework.com/
     * @copyright Copyright (c) 2008 Yii Software LLC
     * @license http://www.yiiframework.com/license/
     */
    
    namespace app\assets;
    
    use yii\web\AssetBundle;
    use yii\web\View;
    
    /**
     * Asset bundle for the Twitter bootstrap css files.
     *
     * @author Qiang Xue <qiang.xue@gmail.com>
     * @since 2.0
     */
    class RequiredAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl = '@web';
        public $jsOptions = ['position' => View::POS_HEAD];
        public $js = [
            'assets/jquery/dist/jquery.min.js',
            'assets/bootstrap/dist/js/bootstrap.min.js',
        ];
    }
