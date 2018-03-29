<?php
    
    namespace app\modules\master\controllers;
    
    use app\modules\master\models\JenisIzinCuti;
    use app\modules\master\models\search\JenisIzinCutiSearch;
    use Exception;
    use Yii;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    
    /**
     * JenisIzinCutiController implements the CRUD actions for JenisIzinCuti model.
     */
    class JenisIzinCutiController extends Controller {
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
         * Daftar data jenis izin / cuti
         *
         * @return mixed
         */
        public function actionIndex() {
            $searchModel = new JenisIzinCutiSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    
        /**
         * Tampilkan detail jenis izin / cuti
         *
         * @param integer $id
         *
         * @return mixed Hasil rendering halaman
         * @throws \Exception
         */
        public function actionView($id) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    
        /**
         * Tambah data jenis izin / cuti baru
         * Jika penyimpanan data berhasil, redirect ke halaman list data
         * Jika penyimpanan data gagal, tetap di halaman buat data baru
         *
         * @return mixed Hasil rendering halaman
         * @throws \Exception
         */
        public function actionCreate() {
            $model = new JenisIzinCuti();
            
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
         * Ubah data jenis izin / cuti
         * Jika penyimpanan data berhasil, redirect ke halaman list data
         * Jika penyimpanan data gagal, tetap di halaman ubah data
         *
         * @param integer $id
         *
         * @return mixed Hasil rendering halaman
         * @throws \Exception
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
         * @return \yii\web\Response Redirect ke halaman list data
         * @throws Exception
         * @throws \Throwable
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
         * @return JenisIzinCuti|null Model yang digunakan
         * @throws \Exception
         */
        protected function findModel($id) {
            if (($model = JenisIzinCuti::findOne($id)) !== NULL) {
                return $model;
            }else{
                Yii::error(Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
                throw new \Exception(Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'));
            }
        }
    }
