<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\GradeQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * Kelas model untuk data grade.
     *
     * @property int    $id             Primary key data grade
     * @property string $kode           Kode grade
     * @property string $nama           Nama grade
     * @property int    $ratesalary     Gaji minimum grade
     * @property int    $spjharian      Besaran uang saku perjalanan dinas
     * @property int    $plafonpinjaman Plafon pinjaman dari perusahaan
     * @property int    $isactive       Status aktif
     * @property int    $createuser     ID user yang membuat data
     * @property string $createtime     Waktu data dibuat
     * @property int    $modifieduser   ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime   Waktu terakhir data diubah
     * @property int    $isdeleted      Status data dihapus
     * @property int    $deleteduser    ID user yang menghapus data
     * @property string $deletedtime    Waktu penghapusan data
     */
    class Grade extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_grade';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode', 'nama'], 'required'],
                [['ratesalary', 'spjharian', 'plafonpinjaman', 'isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['kode'], 'string', 'max' => 4],
                [['nama'], 'string', 'max' => 255],
                [['kode'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'             => Yii::t('master_grade', 'ID'),
                'kode'           => Yii::t('master_grade', 'Kode'),
                'nama'           => Yii::t('master_grade', 'Nama'),
                'ratesalary'     => Yii::t('master_grade', 'Rate Gaji'),
                'spjharian'      => Yii::t('master_grade', 'Uang Saku SPJ'),
                'plafonpinjaman' => Yii::t('master_grade', 'Plafon Pinjaman'),
                'isactive'       => Yii::t('master_grade', 'Status Aktif'),
                'createuser'     => Yii::t('master_grade', 'Createuser'),
                'createtime'     => Yii::t('master_grade', 'Createtime'),
                'modifieduser'   => Yii::t('master_grade', 'Modifieduser'),
                'modifiedtime'   => Yii::t('master_grade', 'Modifiedtime'),
                'isdeleted'      => Yii::t('master_grade', 'Isdeleted'),
                'deleteduser'    => Yii::t('master_grade', 'Deleteduser'),
                'deletedtime'    => Yii::t('master_grade', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return GradeQuery the active query used by this AR class.
         */
        public static function find() {
            return new GradeQuery(get_called_class());
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
