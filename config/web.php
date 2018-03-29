<?php
    
    $params = require __DIR__ . '/params.php';
    $db = require __DIR__ . '/db.php';
    
    $config = [
        'id'             => 'akhdanihr',
        'basePath'       => dirname(__DIR__),
        'bootstrap'      => ['log'],
        'aliases'        => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
        ],
        'language'       => 'id-ID',
        'sourceLanguage' => 'id-ID',
        'modules'        => [
            'rbac'         => [
                'class' => 'yii2mod\rbac\Module',
                /*'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className()
                ],*/
            ],
            'master'       => [
                'class'     => 'app\modules\master\Module',
                'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => TRUE,
                            'roles' => ['@'], // todo : remove after rbac roles and permission already set
                        ]
                    ]
                ],
            ],
            'system'       => [
                'class' => 'app\modules\system\Module',
                /*'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className()
                ],*/
            ],
            'humancapital' => [
                'class' => 'app\modules\humancapital\Module',
                /*'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className()
                ],*/
            ],
            'cms'          => [
                'class' => 'app\modules\cms\Module',
                /*'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className()
                ],*/
            ],
            'org'          => [
                'class'     => 'app\modules\org\Module',
                'as access' => [
                    'class' => yii2mod\rbac\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => TRUE,
                            'roles' => ['@'], // todo : remove after rbac roles and permission already set
                        ]
                    ]
                ],
            ],
        ],
        'components'     => [
            'assetManager' => [
                'assetMap' => [
                    'jquery.js' => '@web/assets/jquery/dist/jquery.min.js',
                    'jquery.min.js' => '@web/assets/jquery/dist/jquery.min.js',
                    'select2.full.js' => '@web/assets/select2/dist/js/select2.full.min.js',
                ],
                'bundles' => [
                    'yii\web\JqueryAsset' => [
                        'js' => []
                    ],
                    'yii\bootstrap\BootstrapAsset' => [
                        'css' => []
                    ]
                ]
            ],
            'formatter'    => [
                'class'             => 'yii\i18n\formatter',
                'thousandSeparator' => '.',
                'decimalSeparator'  => ',',
            ],
            'authManager'  => [
                'class'        => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest', 'user'],
            ],
            'request'      => [
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                'cookieValidationKey' => '-bINHpG763k8XwODJY_nFxoxFfA9bP50',
            ],
            'cache'        => [
                'class' => 'yii\caching\FileCache',
            ],
            'user'         => [
                'identityClass'   => 'app\modules\system\models\User',
                'enableAutoLogin' => FALSE,
                'loginUrl'        => ['system/auth/login'],
                'authTimeout'     => 3600
            ],
            'errorHandler' => [
                'errorAction' => 'home/error',
            ],
            'mailer'       => [
                'class'            => 'yii\swiftmailer\Mailer',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => TRUE,
            ],
            'log'          => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db'           => $db,
            'urlManager'   => [
                'enablePrettyUrl' => TRUE,
                'showScriptName'  => FALSE,
                'rules'           => [
                ],
            ],
            'i18n'         => [
                'translations' => [
                    'app*'         => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'en-US',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'app' => 'app.php'
                        ],
                    ],
                    'akhdanihr'    => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'en-US',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'akhdanihr' => 'akhdanihr.php'
                        ],
                    ],
                    'system*'      => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'id-ID',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'system_config'     => 'system_config.php',
                            'system_notifikasi' => 'system_notifikasi.php',
                            'system_role'       => 'system_role.php',
                            'system_todo'       => 'system_todo.php',
                            'system_user'       => 'system_user.php',
                            'system_menu'       => 'system_menu.php',
                        ],
                    ],
                    'master*'      => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'id-ID',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'master_grade'         => 'master_grade.php',
                            'master_harilibur'     => 'master_harilibur.php',
                            'master_jabatan'       => 'master_jabatan.php',
                            'master_jenisizincuti' => 'master_jenisizincuti.php',
                            'master_kontak'        => 'master_kontak.php',
                            'master_kota'          => 'master_kota.php',
                            'master_provinsi'      => 'master_provinsi.php',
                            'master_referensi'     => 'master_referensi.php',
                            'master_unitkerja'     => 'master_unitkerja.php',
                            'master_universitas'   => 'master_universitas.php',
                        ],
                    ],
                    'org*'         => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'id-ID',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'org_identitasperusahaan' => 'org_identitasperusahaan.php',
                            'org_izinusaha'           => 'org_izinusaha.php',
                            'org_pajak'               => 'org_pajak.php',
                            'org_pemilik'             => 'org_pemilik.php',
                            'org_pengurus'            => 'org_pengurus.php',
                            'org_peralatan'           => 'org_peralatan.php',
                        ],
                    ],
                    'yii2mod.rbac' => [
                        'class'            => 'yii\i18n\PhpMessageSource',
                        'basePath'         => '@app/messages',
                        'sourceLanguage'   => 'en-US',
                        'forceTranslation' => TRUE,
                        'fileMap'          => [
                            'yii2mod.rbac' => 'yii2mod.rbac.php'
                        ],
                    ],
                ],
            ],
        ],
        'params'         => $params,
    ];
    
    if (YII_ENV_DEV) {
        // configuration adjustments for 'dev' environment
        $config['bootstrap'][] = 'debug';
        $config['modules']['debug'] = [
            'class'     => 'yii\debug\Module',
            'traceLine' => '<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ];
        
        $config['bootstrap'][] = 'gii';
        $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ];
    }
    
    return $config;
