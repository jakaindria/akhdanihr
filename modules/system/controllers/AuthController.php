<?php
    
    namespace app\modules\system\controllers;
    
    use app\modules\system\models\User;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    
    /**
     * Class AuthController
     * @package app\modules\system\controllers
     */
    class AuthController extends Controller {
        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [
                'verbs' => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'index'    => ['GET'],
                        'login'    => ['GET'],
                        'logout'   => ['GET'],
                        'do-login' => ['POST'],
                    ],
                ]
            ];
        }
        
        /**
         * @param \yii\base\Action $action
         *
         * @return bool
         * @throws \yii\web\BadRequestHttpException
         */
        public function beforeAction($action) {
            // disable Cross-site request Forgery (CSRF) for dologin action
            if ($action->id == 'do-login') $this->enableCsrfValidation = FALSE;
            
            return parent::beforeAction($action);
        }
    
        /**
         * Proses permohonan login, kemudian redirect ke halaman tertentu apabila login berhasil. Jika gagal, redirect
         * ke halaman login
         */
        public function actionDoLogin() {
            // redirect ke halaman home apabila user sudah memiliki session
            if (!\Yii::$app->user->isGuest) $this->redirect(\Yii::$app->getHomeUrl() . "home/internal");
            $post = \Yii::$app->request->post();
    
            // validasi input username dan password tidak boleh kosong
            $model = new User();
            $model->setAttributes($post['User']);
            // login ke aplikasi kemudian redirect ke halaman tertentu
            if ($model->login($post['_csrf'])) {
                \Yii::$app->session->setFlash('msg_success', 'Login berhasil!');
                $this->redirect(\Yii::$app->getHomeUrl());
            } else {
                \Yii::$app->session->setFlash('msg_error', 'Username / password yang Anda masukan tidak sesuai');
                $this->redirect(\Yii::$app->getHomeUrl() . \Yii::$app->user->loginUrl[0]);
            }
        }
        
        /**
         * Cek apakah ada user sudah login, kemudian redirect ke halaman tertentu sesuai dengan status login user tsb
         */
        public function actionIndex() {
            if (\Yii::$app->user->isGuest) {
                User::logout();
                // redirect ke halaman login jika belum login
                $this->redirect(\Yii::$app->getHomeUrl() . \Yii::$app->user->loginUrl[0]);
            } else {
                // redirect ke home
                $this->redirect(\Yii::$app->getHomeUrl() . "home/internal");
            }
        }
        
        /**
         * Tamplikan halaman login apabila user belum memiliki session aktif, atau redirect ke halaman tertentu jika
         * sudah memiliki session aktif
         *
         * @return bool|string
         */
        public function actionLogin() {
            // jika user sudah login, redirect ke halaman home
            if (!\Yii::$app->user->isGuest) {
                \Yii::$app->session->setFlash('msg_error', 'Anda sudah login!');
                $this->redirect(\Yii::$app->getHomeUrl() . "home/internal");
            }
            
            $this->layout = "@app/views/layouts/login";
            $model = new User();
            
            return $this->render('login', [
                'model' => $model
            ]);
        }
        
        /**
         * Logout dari aplikasi dan redirect ke halaman login
         */
        public function actionLogout() {
            if (!\Yii::$app->user->isGuest && User::logout()) {
                \Yii::$app->session->setFlash('msg_success', 'Logout berhasil!');
            } else {
                \Yii::$app->session->setFlash('msg_error', 'Anda belum login!');
            }
            
            $this->redirect(\Yii::$app->getHomeUrl() . \Yii::$app->user->loginUrl[0]);
        }
        
    }
