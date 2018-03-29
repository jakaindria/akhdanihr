<?php
    
    namespace app\modules\org\models;
    
    use app\modules\org\models\query\PemilikQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "org_pemilik".
     *
     * @property int    $id           Primary key dari tabel
     * @property string $nama         Nama pemilik
     * @property string $noktp        Nomor KTP
     * @property string $alamat       Alamat pemilik
     * @property string $saham        Jumlah saham
     * @property string $satuan       Satuan saham
     * @property int    $createuser   ID user yang membuat data
     * @property string $createtime   Waktu data dibuat
     * @property int    $modifieduser ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime Waktu terakhir data diubah
     * @property int    $isdeleted    Status data dihapus
     * @property int    $deleteduser  ID user yang menghapus data
     * @property string $deletedtime  Waktu penghapusan data
     */
    class Pemilik extends ActiveRecord {
        const SATUAN_SAHAM_PERSEN = 'PERSEN';
        const SATUAN_SAHAM_LEMBAR = 'LEMBAR';
    
        /**
         * Pilihan satuan saham
         *
         * @return array
         */
        public static function getSatuanSahamWithLabel() {
            return [
                Pemilik::SATUAN_SAHAM_LEMBAR => Yii::t('org_pemilik', 'Lembar'),
                Pemilik::SATUAN_SAHAM_PERSEN => Yii::t('org_pemilik', 'Persen')
            ];
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'org_pemilik';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['nama', 'noktp', 'saham'], 'required'],
                [['saham'], 'number'],
                [['createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama', 'alamat'], 'string', 'max' => 255],
                [['noktp'], 'string', 'max' => 50],
                [['satuan'], 'string', 'max' => 10],
                [['noktp'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('org_pemilik', 'ID'),
                'nama'         => Yii::t('org_pemilik', 'Nama'),
                'noktp'        => Yii::t('org_pemilik', 'Nomor KTP'),
                'alamat'       => Yii::t('org_pemilik', 'Alamat'),
                'saham'        => Yii::t('org_pemilik', 'Jumlah Saham'),
                'satuan'       => Yii::t('org_pemilik', 'Satuan Saham'),
                'createuser'   => Yii::t('org_pemilik', 'Createuser'),
                'createtime'   => Yii::t('org_pemilik', 'Createtime'),
                'modifieduser' => Yii::t('org_pemilik', 'Modifieduser'),
                'modifiedtime' => Yii::t('org_pemilik', 'Modifiedtime'),
                'isdeleted'    => Yii::t('org_pemilik', 'Isdeleted'),
                'deleteduser'  => Yii::t('org_pemilik', 'Deleteduser'),
                'deletedtime'  => Yii::t('org_pemilik', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return PemilikQuery the active query used by this AR class.
         */
        public static function find() {
            return new PemilikQuery(get_called_class());
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
