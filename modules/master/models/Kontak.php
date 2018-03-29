<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\KontakQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;

    /**
     * This is the model class for table "mst_kontak".
     *
     * @property int    $id            Primary key tabel
     * @property string $nama          Nama kontak
     * @property string $alamat        Alamat
     * @property string $telepon       Nomor telepon
     * @property string $fax           Nomor Fax
     * @property string $email         Alamat email
     * @property string $npwp          NPWP
     * @property string $jenis         Jenis kontak apakah badan hukum atau individu
     * @property string $asal          Sumber informasi kontak apakah internal atau eksternal
     * @property string $klasifikasi   Klasifikasi kontak
     * @property int    $isactive      Status aktif
     * @property int    $createuser    ID user yang membuat data
     * @property string $createtime    Waktu data dibuat
     * @property int    $modifieduser  ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime  Waktu terakhir data diubah
     * @property int    $isdeleted     Status data dihapus
     * @property int    $deleteduser   ID user yang menghapus data
     * @property string $deletedtime   Waktu penghapusan data
     */
    class Kontak extends ActiveRecord {
        /**
         * Kontak milik badan hukum / perusahaan
         */
        const JENIS_BADANHUKUM = 'JKBHK';
        /**
         * Kontak milik perorangan
         */
        const JENIS_INDIVIDU = 'JKIND';
        /**
         * Asal kontak dari internal perusahaan
         */
        const ASAL_INTERNAL = 'AKINT';
        /**
         * Asal kontak dari eksternal perusahaan
         */
        const ASAL_EKSTERNAL = 'AKEXT';
        /**
         * Kontak milik customer
         */
        const KLASIFIKASI_CUSTOMER = 'KKCUS';
        /**
         * Kontak milik supplier
         */
        const KLASIFIKASI_SUPPLIER = 'KKSUP';
        /**
         * Kontak milik customer yang juga supplier
         */
        const KLASIFIKASI_CUSTOMER_SUPPLIER = 'KKCSP';
        /**
         * Kontak lainnya
         */
        const KLASIFIKASI_LAINNYA = 'KKETC';
        
        /**
         * Pilihan jenis kontak beserta label
         *
         * @return array
         */
        public static function getJenisWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_MST_JENISKONTAK))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * Pilihan asal kontak beserta label
         *
         * @return array
         */
        public static function getAsalWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_MST_ASALKONTAK))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * Pilihan klasifikasi kontak beserta label
         *
         * @return array
         */
        public static function getKlasifikasiWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_MST_KLASIFIKASIKONTAK))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_kontak';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['nama'], 'required'],
                [['isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama'], 'string', 'max' => 100],
                [['alamat', 'email'], 'string', 'max' => 255],
                [['telepon', 'fax'], 'string', 'max' => 50],
                [['npwp'], 'string', 'max' => 25],
                [['email'], 'email'],
                [['jenis', 'asal', 'klasifikasi'], 'string', 'max' => 5],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('master_kontak', 'ID'),
                'nama'         => Yii::t('master_kontak', 'Nama'),
                'alamat'       => Yii::t('master_kontak', 'Alamat'),
                'telepon'      => Yii::t('master_kontak', 'Telepon'),
                'fax'          => Yii::t('master_kontak', 'Fax'),
                'email'        => Yii::t('master_kontak', 'Email'),
                'npwp'         => Yii::t('master_kontak', 'Npwp'),
                'jenis'        => Yii::t('master_kontak', 'Jenis'),
                'asal'         => Yii::t('master_kontak', 'Asal'),
                'klasifikasi'  => Yii::t('master_kontak', 'Klasifikasi'),
                'isactive'     => Yii::t('master_kontak', 'Status Aktif'),
                'createuser'   => Yii::t('master_kontak', 'Createuser'),
                'createtime'   => Yii::t('master_kontak', 'Createtime'),
                'modifieduser' => Yii::t('master_kontak', 'Modifieduser'),
                'modifiedtime' => Yii::t('master_kontak', 'Modifiedtime'),
                'isdeleted'    => Yii::t('master_kontak', 'Isdeleted'),
                'deleteduser'  => Yii::t('master_kontak', 'Deleteduser'),
                'deletedtime'  => Yii::t('master_kontak', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return KontakQuery the active query used by this AR class.
         */
        public static function find() {
            return new KontakQuery(get_called_class());
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
