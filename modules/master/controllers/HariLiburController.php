<?php
    
    namespace app\modules\master\controllers;
    
    use app\modules\master\models\HariLibur;
    use app\modules\master\models\search\HariLiburSearch;
    use Exception;
    use Throwable;
    use Yii;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use yii\web\Response;
    
    /**
     * HariLiburController implements the CRUD actions for HariLibur model.
     */
    class HariLiburController extends Controller {
        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [
                'verbs' => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'index'  => ['GET'],
                        'view'   => ['GET'],
                        'create' => ['GET', 'POST'],
                        'update' => ['GET', 'POST', 'PUT'],
                        'delete' => ['POST', 'DELETE']
                    ],
                ],
            ];
        }
        
        /**
         * Daftar data hari libur
         *
         * @return mixed Hasil rendering halaman
         */
        public function actionIndex() {
            $searchModel = new HariLiburSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        /**
         * Tampilkan detail hari libur
         *
         * @param integer $id
         *
         * @return mixed Hasil rendering halaman
         * @throws Exception
         */
        public function actionView($id) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        
        /**
         * Tambah data hari libur baru
         * Jika penyimpanan data berhasil, redirect ke halaman list data
         * Jika penyimpanan data gagal, tetap di halaman buat data baru
         *
         * @return mixed Hasil rendering halaman
         * @throws \Exception
         */
        public function actionCreate() {
            $model = new HariLibur();
    
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    \Yii::$app->session->setFlash('msg_success', \Yii::t('akhdanihr','Data berhasil disimpan!'));
            
                    return $this->redirect(['.']);
                } else {
                    Yii::error($model->getErrors());
                    \Yii::$app->session->setFlash('msg_error', \Yii::t('akhdanihr','Terjadi kesalahan saat menyimpan data!'));
                }
            }
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        /**
         * Ubah data hari libur
         * Jika penyimpanan data berhasil, redirect ke halaman list data
         * Jika penyimpanan data gagal, tetap di halaman ubah data
         *
         * @param integer $id
         *
         * @return mixed Hasil rendering halaman
         * @throws Exception
         */
        public function actionUpdate($id) {
            $model = $this->findModel($id);
    
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    \Yii::$app->session->setFlash('msg_success', \Yii::t('akhdanihr','Data berhasil disimpan!'));
            
                    return $this->redirect(['.']);
                } else {
                    Yii::error($model->getErrors());
                    \Yii::$app->session->setFlash('msg_error', \Yii::t('akhdanihr','Terjadi kesalahan saat menyimpan data!'));
                }
            }
            
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    
        /**
         * Hapus data dan set flash message
         *
         * @param integer $id
         *
         * @return Response Redirect ke halaman list data
         * @throws Exception
         * @throws Throwable
         */
        public function actionDelete($id) {
            $model = $this->findModel($id);
    
            if ($model->delete()) {
                \Yii::$app->session->setFlash('msg_success', \Yii::t('akhdanihr','Data berhasil dihapus!'));
            } else {
                Yii::error($model->getErrors());
                \Yii::$app->session->setFlash('msg_error', \Yii::t('akhdanihr','Terjadi kesalahan saat menghapus data!'));
            }
            
            return $this->redirect(Yii::$app->request->referrer ?: ['.']);
        }
        
        /**
         * Ambil data berdasarkan nilai primary key model ybs. Jika data tidak ditemukan lempar 404 HTTP Exception
         *
         * @param integer $id
         *
         * @return HariLibur|null Model yang digunakan
         * @throws Exception jika data tidak ditemukan
         */
        protected function findModel($id) {
            if (($model = HariLibur::findOne($id)) !== NULL) {
                return $model;
            } else {
                Yii::error(Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
                throw new Exception(Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
            }
        }
    }
