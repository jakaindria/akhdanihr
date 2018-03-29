<?php
    
    namespace app\modules\org\models;
    
    use app\modules\master\models\Referensi;
    use app\modules\org\models\query\PeralatanQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;

    /**
     * This is the model class for table "org_peralatan".
     *
     * @property int    $id                Primary key dari tabel
     * @property string $nama              Nama perlatan
     * @property int    $jumlah            Jumlah peralatan
     * @property string $kapasitas         Keterangan kapasitas
     * @property string $merktipe          Merek dan tipe peralatan
     * @property int    $tahun             Tahun pembuatan
     * @property string $kondisi           Kondisi peralatan
     * @property string $lokasi            Lokasi peralatan
     * @property string $statuskepemilikan Status kepemilikan
     * @property string $bukti             Bukti kepemilikan
     * @property int    $createuser        ID user yang membuat data
     * @property string $createtime        Waktu data dibuat
     * @property int    $modifieduser      ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime      Waktu terakhir data diubah
     * @property int    $isdeleted         Status data dihapus
     * @property int    $deleteduser       ID user yang menghapus data
     * @property string $deletedtime       Waktu penghapusan data
     */
    class Peralatan extends ActiveRecord {
        const KEPEMILIKAN_SENDIRI = 'SKA01';
        const KEPEMILIKAN_SEWA = 'SKA02';
        const KEPEMILIKAN_DUKUNGAN = 'SKA03';
        
        const KONDISI_BAIK = 'KON01';
        const KONDISI_RUSAK = 'KON02';
    
        /**
         * Pilihan kepemilikan peralatan beserta label
         *
         * @return array
         */
        public static function getKepemilikanWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_ORG_STATUSKEPEMILIKANALAT))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * Pilihan kondisi peralatan beserta label
         *
         * @return array
         */
        public static function getKondisiWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_ORG_KONDISIPERALATAN))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'org_peralatan';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['nama', 'jumlah'], 'required'],
                [['jumlah', 'tahun', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama', 'kapasitas', 'merktipe', 'lokasi', 'bukti'], 'string', 'max' => 255],
                [['kondisi'], 'string', 'max' => 10],
                [['statuskepemilikan'], 'string', 'max' => 5],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                => Yii::t('org_peralatan', 'ID'),
                'nama'              => Yii::t('org_peralatan', 'Nama'),
                'jumlah'            => Yii::t('org_peralatan', 'Jumlah'),
                'kapasitas'         => Yii::t('org_peralatan', 'Kapasitas'),
                'merktipe'          => Yii::t('org_peralatan', 'Merk dan Tipe'),
                'tahun'             => Yii::t('org_peralatan', 'Tahun Pembuatan'),
                'kondisi'           => Yii::t('org_peralatan', 'Kondisi'),
                'lokasi'            => Yii::t('org_peralatan', 'Lokasi'),
                'statuskepemilikan' => Yii::t('org_peralatan', 'Status Kepemilikan'),
                'bukti'             => Yii::t('org_peralatan', 'Bukti'),
                'createuser'        => Yii::t('org_peralatan', 'Createuser'),
                'createtime'        => Yii::t('org_peralatan', 'Createtime'),
                'modifieduser'      => Yii::t('org_peralatan', 'Modifieduser'),
                'modifiedtime'      => Yii::t('org_peralatan', 'Modifiedtime'),
                'isdeleted'         => Yii::t('org_peralatan', 'Isdeleted'),
                'deleteduser'       => Yii::t('org_peralatan', 'Deleteduser'),
                'deletedtime'       => Yii::t('org_peralatan', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return PeralatanQuery the active query used by this AR class.
         */
        public static function find() {
            return new PeralatanQuery(get_called_class());
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
