<?php
    
    namespace app\controllers;
    
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\rbac\Item;
    use yii\web\Controller;
    use yii2mod\rbac\models\search\AuthItemSearch;

    class HomeController extends Controller {
        /**
         * @inheritdoc
         */
        public function actions() {
            return [];
        }
        
        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [
                'verbs'  => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                    
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'roles'   => ['@'],
                            'allow'   => TRUE,
                            'actions' => [ 'index', 'error' ]
                        ]
                    ]
                ],
            ];
        }
        
        public function actionIndex() {
            $this->layout = "main";
            
            return $this->render('index');
        }
        
        public function actionError() {
            $this->layout = "main";
    
            $exception = \Yii::$app->errorHandler->exception;
            
            return $this->render('error', ['exception' => $exception]);
        }
    }
