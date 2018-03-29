<?php
    
    namespace app\modules\org\models;
    
    use app\modules\org\models\query\PengurusQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "org_pengurus".
     *
     * @property int    $id                Primary key dari tabel
     * @property string $nama              Nama pengurus
     * @property string $noktp             Nomor KTP
     * @property string $alamat            Alamat pengurus
     * @property string $jabatan           Jabatan pengurus
     * @property string $tglmenjabatdari   Tanggal mulai menjabat
     * @property string $tglmenjabatsampai Tanggal selesai menjabat
     * @property int    $createuser        ID user yang membuat data
     * @property string $createtime        Waktu data dibuat
     * @property int    $modifieduser      ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime      Waktu terakhir data diubah
     * @property int    $isdeleted         Status data dihapus
     * @property int    $deleteduser       ID user yang menghapus data
     * @property string $deletedtime       Waktu penghapusan data
     */
    class Pengurus extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'org_pengurus';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['nama', 'noktp', 'tglmenjabatdari'], 'required'],
                [['tglmenjabatdari', 'tglmenjabatsampai', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'alamat'], 'string', 'max' => 255],
                [['noktp'], 'string', 'max' => 100],
                [['jabatan'], 'string', 'max' => 50],
                [['noktp'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                => Yii::t('org_pengurus', 'ID'),
                'nama'              => Yii::t('org_pengurus', 'Nama'),
                'noktp'             => Yii::t('org_pengurus', 'Nomor KTP'),
                'alamat'            => Yii::t('org_pengurus', 'Alamat'),
                'jabatan'           => Yii::t('org_pengurus', 'Jabatan'),
                'tglmenjabatdari'   => Yii::t('org_pengurus', 'Tgl Mulai Menjabat'),
                'tglmenjabatsampai' => Yii::t('org_pengurus', 'Tgl Akhir Menjabat'),
                'createuser'        => Yii::t('org_pengurus', 'Createuser'),
                'createtime'        => Yii::t('org_pengurus', 'Createtime'),
                'modifieduser'      => Yii::t('org_pengurus', 'Modifieduser'),
                'modifiedtime'      => Yii::t('org_pengurus', 'Modifiedtime'),
                'isdeleted'         => Yii::t('org_pengurus', 'Isdeleted'),
                'deleteduser'       => Yii::t('org_pengurus', 'Deleteduser'),
                'deletedtime'       => Yii::t('org_pengurus', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return PengurusQuery the active query used by this AR class.
         */
        public static function find() {
            return new PengurusQuery(get_called_class());
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
