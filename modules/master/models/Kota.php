<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\KotaQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "mst_kota".
     *
     * @property int      $id            Primary key table
     * @property string   $kode          Kode kota
     * @property string   $nama          Nama Kota
     * @property int      $provinceid    ID provinsi
     * @property int      $createuser    ID user yang membuat data
     * @property string   $createtime    Waktu data dibuat
     * @property int      $modifieduser  ID user yang terakhir melakukan perubahan data
     * @property string   $modifiedtime  Waktu terakhir data diubah
     * @property int      $isdeleted     Status data dihapus
     * @property int      $deleteduser   ID user yang menghapus data
     * @property string   $deletedtime   Waktu penghapusan data
     *
     * @property Provinsi $provinsi
     */
    class Kota extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_kota';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['provinceid', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['kode'], 'string', 'max' => 5],
                [['nama'], 'string', 'max' => 255],
                [['kode'], 'unique'],
                [['provinceid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinceid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('master_kota', 'ID'),
                'kode'         => Yii::t('master_kota', 'Kode'),
                'nama'         => Yii::t('master_kota', 'Nama'),
                'provinceid'   => Yii::t('master_kota', 'ID Provinsi'),
                'createuser'   => Yii::t('master_kota', 'Createuser'),
                'createtime'   => Yii::t('master_kota', 'Createtime'),
                'modifieduser' => Yii::t('master_kota', 'Modifieduser'),
                'modifiedtime' => Yii::t('master_kota', 'Modifiedtime'),
                'isdeleted'    => Yii::t('master_kota', 'Isdeleted'),
                'deleteduser'  => Yii::t('master_kota', 'Deleteduser'),
                'deletedtime'  => Yii::t('master_kota', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getProvinsi() {
            return $this->hasOne(Provinsi::className(), ['id' => 'provinceid']);
        }
        
        /**
         * @inheritdoc
         * @return KotaQuery the active query used by this AR class.
         */
        public static function find() {
            return new KotaQuery(get_called_class());
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
