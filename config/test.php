<?php
    $params = require __DIR__ . '/params.php';
    $db = require __DIR__ . '/test_db.php';
    
    /**
     * Application configuration shared by all test types
     */
    return [
        'id'             => 'basic-tests',
        'basePath'       => dirname(__DIR__),
        'aliases'        => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
        ],
        'language'       => 'id-ID',
        'sourceLanguage' => 'id-ID',
        'modules'        => [
            'rbac' => [
                'class' => 'yii2mod\rbac\Module',
            ],
            'master'       => [
                'class' => 'app\modules\master\Module',
            ],
            'system'       => [
                'class' => 'app\modules\system\Module',
            ],
            'humancapital' => [
                'class' => 'app\modules\humancapital\Module',
            ],
            'cms'          => [
                'class' => 'app\modules\cms\Module',
            ],
            'org'          => [
                'class' => 'app\modules\org\Module',
            ],
        ],
        'components'     => [
            'db'           => $db,
            'mailer'       => [
                'useFileTransport' => TRUE,
            ],
            'authManager'  => [
                'class'        => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest', 'user'],
            ],
            'assetManager' => [
                'basePath' => __DIR__ . '/../web/assets',
            ],
            'urlManager'   => [
                'enablePrettyUrl' => TRUE,
                'showScriptName'  => FALSE,
                'rules'           => [
                ],
            ],
            'user'         => [
                'identityClass'   => 'app\modules\sys\models\User',
                'enableAutoLogin' => FALSE,
                'enableSession'   => TRUE,
                'loginUrl'        => ['system/auth/login'],
                'authTimeout'     => 3600
            ],
            'request'      => [
                'cookieValidationKey'  => 'akhdanihrtestcookie',
                'enableCsrfValidation' => FALSE,
                // but if you absolutely need it set cookie domain to localhost
                /*
                'csrfCookie' => [
                    'domain' => 'localhost',
                ],
                */
            ],
        ],
        'params'         => $params,
    ];
