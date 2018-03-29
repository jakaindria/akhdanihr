<?php
    
    namespace app\modules\master\models;
    
    use app\modules\humancapital\models\PegawaiUnitKerja;
    use app\modules\master\models\query\UnitKerjaQuery;
    use app\modules\system\models\Todo;
    use app\modules\system\models\UserRole;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "mst_unit_kerja".
     *
     * @property int                $id           Primary key dari table
     * @property string             $kode         Kode unit kerja
     * @property int                $parentid     ID unit kerja parent
     * @property string             $treecode     Treecode unit kerja
     * @property string             $nama         Nama unit kerja
     * @property string             $alamat       Alamat unit kerja
     * @property string             $telepon      Nomor telepon unit kerja
     * @property string             $fax          Nomor fax unit kerja
     * @property string             $email        Email kontak unit kerja
     * @property int                $ishavegl     Flag apakah unit kerja memiliki GL sendiri untuk kebutuhan finance
     * @property int                $isactive     Status aktif
     * @property int                $createuser   ID user yang membuat data
     * @property string             $createtime   Waktu data dibuat
     * @property int                $modifieduser ID user yang terakhir melakukan perubahan data
     * @property string             $modifiedtime Waktu terakhir data diubah
     * @property int                $isdeleted    Status data dihapus
     * @property int                $deleteduser  ID user yang menghapus data
     * @property string             $deletedtime  Waktu penghapusan data
     *
     * @property PegawaiUnitkerja[] $pegawaiUnitkerjas
     * @property Todo[]             $todos
     * @property Userrole[]         $userroles
     */
    class UnitKerja extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_unit_kerja';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode', 'treecode', 'nama'], 'required'],
                [['parentid', 'ishavegl', 'isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['kode', 'treecode'], 'string', 'max' => 5],
                [['nama'], 'string', 'max' => 100],
                [['alamat', 'email'], 'string', 'max' => 255],
                [['telepon', 'fax'], 'string', 'max' => 50],
                [['email'], 'email'],
                [['kode'], 'unique'],
                [['treecode'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('master_unitkerja', 'ID'),
                'kode'         => Yii::t('master_unitkerja', 'Kode'),
                'parentid'     => Yii::t('master_unitkerja', 'Parent'),
                'treecode'     => Yii::t('master_unitkerja', 'Treecode'),
                'nama'         => Yii::t('master_unitkerja', 'Nama'),
                'alamat'       => Yii::t('master_unitkerja', 'Alamat'),
                'telepon'      => Yii::t('master_unitkerja', 'Telepon'),
                'fax'          => Yii::t('master_unitkerja', 'Fax'),
                'email'        => Yii::t('master_unitkerja', 'Email'),
                'ishavegl'     => Yii::t('master_unitkerja', 'Memiliki GL Sendiri'),
                'isactive'     => Yii::t('master_unitkerja', 'Status Aktif'),
                'createuser'   => Yii::t('master_unitkerja', 'Createuser'),
                'createtime'   => Yii::t('master_unitkerja', 'Createtime'),
                'modifieduser' => Yii::t('master_unitkerja', 'Modifieduser'),
                'modifiedtime' => Yii::t('master_unitkerja', 'Modifiedtime'),
                'isdeleted'    => Yii::t('master_unitkerja', 'Isdeleted'),
                'deleteduser'  => Yii::t('master_unitkerja', 'Deleteduser'),
                'deletedtime'  => Yii::t('master_unitkerja', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiUnitkerjas() {
            return $this->hasMany(PegawaiUnitkerja::className(), ['unitkerjaid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getTodos() {
            return $this->hasMany(Todo::className(), ['unitid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUserroles() {
            return $this->hasMany(Userrole::className(), ['unitkerjaid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return UnitKerjaQuery the active query used by this AR class.
         */
        public static function find() {
            return new UnitKerjaQuery(get_called_class());
        }
        
        /**
         * @inheritdoc
         */
        public function beforeSave($insert) {
            if (!parent::beforeSave($insert)) {
                Yii::error($this->getErrors());
                
                return FALSE;
            }
            
            foreach ($this->dirtyAttributes as $key => $val) {
                if ($val == "") $this->{$key} = NULL;
            }
            
            if ($insert) {
                $this->createuser = \Yii::$app->user->getId();
                $this->createtime = date("Y-m-d H:i:s");
                
                // ambil unit kerja dengan kode terakhir
                $jobposition = UnitKerja::find()->orderBy("kode DESC")->one();
                
                if ($jobposition !== NULL) {
                    // generate kode baru
                    // kode baru = kode terakhir + 1, format leading zero 4 karakter
                    $lastcode = intval($jobposition->attributes['kode']);
                    $this->kode = str_pad(++$lastcode, 4, '0', STR_PAD_LEFT);
                } else {
                    // jika belum ada data unit kerja, set kode sebagai 0001
                    $this->kode = '0001';
                }
                
                // ambil parent jika dipilih
                $parent = isset($this->attributes['parentid']) && $this->attributes['parentid'] !== '' ? UnitKerja::find()->andWhere("id = " . $this->attributes['parentid'])->one() : NULL;
                
                // generate treecode
                // treecode = treecode parent (jika ada) + kode UnitKerja baru. separator kode menggunakan titik
                $this->treecode = $parent ? $parent->attributes['treecode'] . '.' . $this->kode : $this->kode;
                
                // jika parent tidak dipilih, set parentid = null
                if (!isset($parent) || is_null($parent)) $this->parentid = NULL;
            } else {
                if ($this->oldAttributes['isdeleted'] == 0 && $this->dirtyAttributes['isdeleted'] == 1) {
                    $this->deleteduser = \Yii::$app->user->getId();
                    $this->deletedtime = date("Y-m-d H:i:s");
                } else {
                    $this->modifieduser = \Yii::$app->user->getId();
                    $this->modifiedtime = date("Y-m-d H:i:s");
                }
            }
            
            return TRUE;
        }
        
        /**
         * Simpan unit kerja dengan melakukan generate / update kode terlebih dahulu
         *
         * @param bool $runValidation
         * @param null $attributeNames
         *
         * @return bool
         * @throws Exception
         * @throws \Exception
         */
        public function save($runValidation = TRUE, $attributeNames = NULL) {
            $connection = \Yii::$app->getDb();
            $transaction = $connection->beginTransaction();
            try {
                if (!$this->isNewRecord) {
                    // cek jika parentid
                    if ($this->oldAttributes['parentid'] !== $this->attributes['parentid']) {
                        // ambil parent jika dipilih
                        $parent = isset($this->attributes['parentid']) && $this->attributes['parentid'] !== '' ? UnitKerja::find()->andWhere("id = " . $this->attributes['parentid'])->one() : NULL;
                        
                        // generate treecode
                        // treecode = treecode parent (jika ada) + kode unit kerja baru. separator kode menggunakan titik
                        $old_treecode = $this->treecode;
                        $this->treecode = $parent ? $parent->attributes['treecode'] . '.' . $this->kode : $this->kode;
                        
                        // jika parent tidak dipilih, set parentid = null
                        // jika parent dipilih, sesuaikan treecode level unit kerja lain di bawah unit kerja yang diubah
                        if (!isset($parent) || is_null($parent)) {
                            $this->parentid = NULL;
                        }
                        
                        // update treecode level unit kerja lain di bawah unit kerja yang diubah
                        $sql = "UPDATE " . self::tableName() . " SET treecode = REPLACE(treecode, '$old_treecode', '$this->treecode') WHERE treecode LIKE '$old_treecode%'";
                        $connection->createCommand($sql)->execute();
                    }
                }
                
                $result = parent::save($runValidation, $attributeNames);
                $transaction->commit();
                
                return $result;
            } catch (Exception $e) {
                Yii::error($e->getMessage());
                $transaction->rollBack();
                throw $e;
            }
        }
        
        /**
         * @inheritdoc
         */
        public function beforeDelete() {
            if (!parent::beforeDelete()) return FALSE;
            
            $this->deleteduser = \Yii::$app->user->getId();
            $this->deletedtime = date("Y-m-d H:i:s");
            
            return TRUE;
        }
        
        /**
         * Override fungsi delete menjadi soft delete
         *
         * @return false|int
         * @throws \Exception
         * @throws \yii\db\StaleObjectException
         * @throws \Throwable
         */
        public function delete() {
            $this->isdeleted = 1;
            $this->deleteduser = \Yii::$app->user->getId();
            $this->deletedtime = date("Y-m-d H:i:s");
            
            return parent::update(FALSE, ['isdeleted', 'deletedtime', 'deleteduser']);
        }
        
        /**
         * Override fungsi delete all
         *
         * @param null|string $condition
         * @param array       $params
         *
         * @return int
         */
        public static function deleteAll($condition = NULL, $params = []) {
            return parent::updateAll([
                                         'isdeleted'   => 1,
                                         'deletedtime' => date("Y-m-d H:i:s"),
                                         'deleteduser' => \Yii::$app->user->getId()
                                     ], $condition, $params);
        }
        
        /**
         * Override fungsi delete internal
         *
         * @return false|int
         * @throws \yii\db\StaleObjectException
         */
        protected function deleteInternal() {
            $this->isdeleted = 1;
            $this->deleteduser = \Yii::$app->user->getId();
            $this->deletedtime = date("Y-m-d H:i:s");
            
            return parent::updateInternal(['isdeleted', 'deletedtime', 'deleteduser']);
        }
    }
