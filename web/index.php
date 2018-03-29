<?php
    
    // comment out the following two lines when deployed to production
    defined('YII_DEBUG') or define('YII_DEBUG', TRUE);
    defined('YII_ENV') or define('YII_ENV', 'dev');
    
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
    
    $config = require __DIR__ . '/../config/web.php';
    
    setlocale(LC_TIME, 'id-ID');
    
    try {
        $application = new yii\web\Application($config);
    } catch (\yii\base\InvalidConfigException $e) {
        Yii::error($e->getMessage());
    }
    $application->defaultRoute = 'home/index';
    $application->run();