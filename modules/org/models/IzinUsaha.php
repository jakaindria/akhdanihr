<?php
    
    namespace app\modules\org\models;
    
    use app\helper\Dokumen;
    use app\modules\master\models\Referensi;
    use app\modules\org\models\query\IzinUsahaQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;
    use yii\web\UploadedFile;

    /**
     * This is the model class for table "org_izin_usaha".
     *
     * @property int    $id           Primary key dari tabel
     * @property string $jenis        Jenis izin usaha
     * @property string $nomor        Nomor dokumen izin usaha
     * @property string $tglberlaku   Tanggal berlaku dokumen
     * @property string $instansi     Instansi yang mengeluarkan izin
     * @property string $klasifikasi  Klasifikasi usaha
     * @property string $kualifikasi  Kualifikasi usaha
     * @property string $docid        ID dokumen tersimpan
     * @property string $docurl       URL dokumen tersimpan
     * @property string $docname      Nama dokumen tersimpan
     * @property int    $createuser   ID user yang membuat data
     * @property string $createtime   Waktu data dibuat
     * @property int    $modifieduser ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime Waktu terakhir data diubah
     * @property int    $isdeleted    Status data dihapus
     * @property int    $deleteduser  ID user yang menghapus data
     * @property string $deletedtime  Waktu penghapusan data
     */
    class IzinUsaha extends ActiveRecord {
        /**
         * Perusahaan Kecil
         */
        const KUALIFIKASI_USAHA_KECIL = 'KIU01';
        /**
         * Perusahaan Besar
         */
        const KUALIFIKASI_USAHA_BESAR = 'KIU02';
    
        /**
         * @var UploadedFile Dokumen izin usaha
         */
        public $dokumen;
    
        /**
         * Pilihan kualifikasi izin usaha beserta label
         *
         * @return array
         */
        public static function getKualifikasiWithLabel(){
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_ORG_KUALIFIKASIIZINUSAHA))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'org_izin_usaha';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['jenis', 'nomor', 'tglberlaku', 'instansi'], 'required'],
                [['tglberlaku', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['jenis', 'nomor', 'instansi', 'klasifikasi', 'docid', 'docurl', 'docname'], 'string', 'max' => 255],
                [['kualifikasi'], 'string', 'max' => 5],
                [['dokumen'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg, pdf, doc, docx']
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('org_izinusaha', 'ID'),
                'jenis'        => Yii::t('org_izinusaha', 'Jenis Izin'),
                'nomor'        => Yii::t('org_izinusaha', 'Nomor Izin'),
                'tglberlaku'   => Yii::t('org_izinusaha', 'Tanggal Berlaku'),
                'instansi'     => Yii::t('org_izinusaha', 'Instansi yang Mengeluarkan Izin'),
                'klasifikasi'  => Yii::t('org_izinusaha', 'Klasifikasi Usaha'),
                'kualifikasi'  => Yii::t('org_izinusaha', 'Kualifikasi Usaha'),
                'docid'        => Yii::t('org_izinusaha', 'ID Dokumen'),
                'docurl'       => Yii::t('org_izinusaha', 'URL Dokumen'),
                'docname'      => Yii::t('org_izinusaha', 'Nama Dokumen'),
                'createuser'   => Yii::t('org_izinusaha', 'Createuser'),
                'createtime'   => Yii::t('org_izinusaha', 'Createtime'),
                'modifieduser' => Yii::t('org_izinusaha', 'Modifieduser'),
                'modifiedtime' => Yii::t('org_izinusaha', 'Modifiedtime'),
                'isdeleted'    => Yii::t('org_izinusaha', 'Isdeleted'),
                'deleteduser'  => Yii::t('org_izinusaha', 'Deleteduser'),
                'deletedtime'  => Yii::t('org_izinusaha', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return IzinUsahaQuery the active query used by this AR class.
         */
        public static function find() {
            return new IzinUsahaQuery(get_called_class());
        }
        
        /**
         * @inheritdoc
         */
        public function beforeSave($insert) {
            try {
                if (!parent::beforeSave($insert)) return FALSE;
                
                // masukan nilai atribut yang berubah ke dalam atribut model dengan key yang sama
                foreach ($this->dirtyAttributes as $key => $val) {
                    if ($val == "") $this->{$key} = NULL;
                }
                
                // cek aksi apakah insert atau update
                if ($insert) {
                    // set nilai atribut id pembuat dan waktu data dibuat
                    $this->createuser = \Yii::$app->user->getId();
                    $this->createtime = date("Y-m-d H:i:s");
                } else {
                    // cek apakah nilai flag data dihapus berubah dari 0 ke 1
                    if ($this->oldAttributes['isdeleted'] == 0 && $this->dirtyAttributes['isdeleted'] == 1) {
                        // set nilai atribut waktu data dihapus serta userid yang menghapus data
                        $this->deleteduser = \Yii::$app->user->getId();
                        $this->deletedtime = date("Y-m-d H:i:s");
                    } else {
                        // set nilai atribut waktu data diubah serta userid yang mengubah data
                        $this->modifieduser = \Yii::$app->user->getId();
                        $this->modifiedtime = date("Y-m-d H:i:s");
                    }
                }
                
                return TRUE;
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
                throw $e;
            }
        }
    
        /**
         * Save data kemudian upload file
         *
         * @param bool $runValidation
         * @param null $attributeNames
         *
         * @return bool
         * @throws Exception
         */
        public function save($runValidation = TRUE, $attributeNames = NULL) {
            if ($runValidation && !parent::validate()){
                Yii::error(implode(" \n ", $this->errors));
                throw new Exception(implode(" \n ", $this->errors));
            }
            
            if (isset($this->dokumen)){
                $dokumen = new Dokumen();
                $dokumen->loadFromModel($this, 'dokumen');
                if ($dokumen->uploadToAlfresco()){
                    $this->docname = $dokumen->name;
                    $this->docid = $dokumen->id;
                    $this->docurl = $dokumen->url;
                }
            }
            
            return parent::save($runValidation, $attributeNames);
        }
    
    
        /**
         * Override fungsi delete menjadi soft delete
         *
         * @return false|int
         * @throws Exception
         */
        public function delete() {
            try {
                // ubah flag data dihapus beserta informasi penghapusan data
                $this->isdeleted = 1;
                $this->deleteduser = \Yii::$app->user->getId();
                $this->deletedtime = date("Y-m-d H:i:s");
                
                // validasi data terhadap rule, lempar exception jika tidak valid
                if (!$this->validate()) throw new Exception(implode(" \n ", $this->errors), 999);
                
                return parent::save();
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
                throw $e;
            }
        }
        
        /**
         * Override fungsi delete all
         *
         * @param null|string $condition
         * @param array       $params
         *
         * @return int
         * @throws Exception
         */
        public static function deleteAll($condition = NULL, $params = []) {
            try {
                // update flag deleted semua data
                return parent::updateAll([
                                             'isdeleted'   => 1,
                                             'deletedtime' => date("Y-m-d H:i:s"),
                                             'deleteduser' => \Yii::$app->user->getId()
                                         ], $condition, $params);
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
                throw $e;
            }
        }
        
        /**
         * Override fungsi delete internal
         *
         * @return false|int
         * @throws Exception
         */
        protected function deleteInternal() {
            try {
                $this->isdeleted = 1;
                $this->deleteduser = \Yii::$app->user->getId();
                $this->deletedtime = date("Y-m-d H:i:s");
                
                // validasi data terhadap rule, lempar exception jika tidak valid
                if (!$this->validate()) throw new Exception(implode(" \n ", $this->getErrors()), 999);
                
                return parent::updateInternal();
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
                throw $e;
            }
        }
    }
