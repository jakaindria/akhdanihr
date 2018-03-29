<?php
    
    namespace app\modules\system\controllers;
    
    use app\modules\system\models\Menu;
    use yii\filters\VerbFilter;
    use yii\helpers\ArrayHelper;
    use yii\rbac\Item;
    use yii\web\Controller;
    use yii2mod\rbac\models\AuthItemModel;
    
    /**
     * MenuController contain menu management for application
     */
    class MenuController extends Controller {
        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [
                'verbs' => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'index' => ['GET', 'POST']
                    ],
                ],
            ];
        }
        
        /**
         * Tampilkan halaman menu management
         *
         * @return mixed Hasil rendering halaman
         * @throws \Exception
         */
        public function actionIndex() {
            $model = new Menu();
            
            $authItemModel = new AuthItemModel();
            $authItemModel->type = Item::TYPE_PERMISSION;
            $availableRoutes = $authItemModel->getItems()['available'];
            $routeOptions = [];
            foreach ($availableRoutes as $key => $val) {
                $routeOptions[$key] = $key;
            }
            
            if (\Yii::$app->request->get("id")) {
                $model = $this->findModel(\Yii::$app->request->get("id"));
            }
            
            if ($model->load(\Yii::$app->request->post())) {
                $model->beforeSave($model->isNewRecord);
                if ($model->save()) {
                    \Yii::$app->session->setFlash('msg_success', \Yii::t('akhdanihr', 'Data berhasil disimpan!'));
                    
                    return $this->redirect(['.']);
                } else {
                    \Yii::error($model->getErrors());
                    \Yii::$app->session->setFlash('msg_error', \Yii::t('akhdanihr', 'Terjadi kesalahan saat menyimpan data!'));
                }
            }
    
            $parent = Menu::find()->parent()->all();
            
            return $this->render('index', [
                'menu'              => $model->allTree(),
                'model'             => $model,
                'routeOptionsData'  => $routeOptions,
                'parentOptionsData'  => ArrayHelper::map($parent, 'id', 'label'),
            ]);
        }
        
        /**
         * Ambil data berdasarkan nilai primary key model ybs. Jika data tidak ditemukan lempar 404 HTTP Exception
         *
         * @param integer $id
         *
         * @return Menu|null Model yang digunakan
         * @throws \Exception
         */
        protected function findModel($id) {
            if (($model = Menu::findOne($id)) !== NULL) {
                return $model;
            } else {
                \Yii::error(\Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
                throw new \Exception(\Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
            }
        }
    }
