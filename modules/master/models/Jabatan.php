<?php
    
    namespace app\modules\master\models;
    
    use app\modules\humancapital\models\PegawaiJabatan;
    use app\modules\master\models\query\JabatanQuery;
    use Exception;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;

    /**
     * Kelas model untuk data jabatan
     *
     * @property int              $id              Primary key dari tabel
     * @property string           $kode            Kode jabatan
     * @property int              $parentid        ID parent jabatan
     * @property string           $treecode        Treecode jabatan
     * @property string           $nama            Nama jabatan
     * @property int              $isactive        Status aktif
     * @property int              $isapprover      Status apakah jabatan ybs bisa melakukan approval untuk proses transaksional
     * @property string           $approvalto      Flag apakah approval dilakukan ke supervisor atau langsung ke SDM
     * @property int              $createuser      ID user yang membuat data
     * @property string           $createtime      Waktu data dibuat
     * @property int              $modifieduser    ID user yang terakhir melakukan perubahan data
     * @property string           $modifiedtime    Waktu terakhir data diubah
     * @property int              $isdeleted       Status data dihapus
     * @property int              $deleteduser     ID user yang menghapus data
     * @property string           $deletedtime     Waktu penghapusan data
     *
     * @property PegawaiJabatan[] $pegawaiJabatans Daftar jabatan pegawai
     */
    class Jabatan extends ActiveRecord {
        /**
         * Kode Jabatan Direktur / Manager SDM untuk keperluan approval
         */
        const KODE_JABATAN_SDM = '0003';
        /**
         * Approval dilakukan ke supervisor
         */
        const APPROVALTO_SPV = 'SPV';
        /**
         * Approval dilakukan langsung ke SDM
         */
        const APPROVALTO_SDM = 'SDM';
    
        /**
         * Pilihan tujuan approval beserta label
         *
         * @return array
         */
        public static function getApprovalToWithLabel(){
            return [
                Jabatan::APPROVALTO_SDM => Yii::t('master_jabatan', 'Direktur SDM'),
                Jabatan::APPROVALTO_SPV => Yii::t('master_jabatan', 'Supervisor')
            ];
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_jabatan';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode', 'treecode', 'approvalto'], 'required'],
                [['parentid', 'isactive', 'isapprover', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['kode'], 'string', 'max' => 4],
                [['treecode', 'nama'], 'string', 'max' => 255],
                [['approvalto'], 'string', 'max' => 3],
                [['kode'], 'unique'],
                [['treecode'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('master_jabatan', 'ID'),
                'kode'         => Yii::t('master_jabatan', 'Kode'),
                'parentid'     => Yii::t('master_jabatan', 'Parent'),
                'treecode'     => Yii::t('master_jabatan', 'Treecode'),
                'nama'         => Yii::t('master_jabatan', 'Nama'),
                'isactive'     => Yii::t('master_jabatan', 'Status Aktif'),
                'isapprover'   => Yii::t('master_jabatan', 'Status Approver'),
                'approvalto'   => Yii::t('master_jabatan', 'Tujuan Approval'),
                'createuser'   => Yii::t('master_jabatan', 'Createuser'),
                'createtime'   => Yii::t('master_jabatan', 'Createtime'),
                'modifieduser' => Yii::t('master_jabatan', 'Modifieduser'),
                'modifiedtime' => Yii::t('master_jabatan', 'Modifiedtime'),
                'isdeleted'    => Yii::t('master_jabatan', 'Isdeleted'),
                'deleteduser'  => Yii::t('master_jabatan', 'Deleteduser'),
                'deletedtime'  => Yii::t('master_jabatan', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiJabatans() {
            return $this->hasMany(PegawaiJabatan::className(), ['jabatanid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return JabatanQuery the active query used by this AR class.
         */
        public static function find() {
            return new JabatanQuery(get_called_class());
        }
    
        /**
         * @inheritdoc
         */
        public function beforeSave($insert) {
            if (!parent::beforeSave($insert)) {
                Yii::error($this->getErrors());
                return FALSE;
            }
        
            foreach ($this->dirtyAttributes as $key => $val){
                if ($val == "") $this->{$key} = NULL;
            }
        
            if ($insert) {
                $this->createuser = \Yii::$app->user->getId();
                $this->createtime = date("Y-m-d H:i:s");
            
                // ambil jabatan dengan kode terakhir
                $jobposition = Jabatan::find()->orderBy("kode DESC")->one();
            
                if ($jobposition !== NULL) {
                    // generate kode baru
                    // kode baru = kode terakhir + 1, format leading zero 4 karakter
                    $lastcode = intval($jobposition->attributes['kode']);
                    $this->kode = str_pad(++$lastcode, 4, '0', STR_PAD_LEFT);
                } else {
                    // jika belum ada data jabatan, set kode sebagai 0001
                    $this->kode = '0001';
                }
            
                // ambil parent jika dipilih
                $parent = isset($this->attributes['parentid']) && $this->attributes['parentid'] !== '' ? Jabatan::find()->andWhere("id = " . $this->attributes['parentid'])->one() : NULL;
            
                // generate treecode
                // treecode = treecode parent (jika ada) + kode jabatan baru. separator kode menggunakan titik
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
         * Simpan jabatan dengan melakukan generate / update kode terlebih dahulu
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
                        $parent = isset($this->attributes['parentid']) && $this->attributes['parentid'] !== '' ? Jabatan::find()->andWhere("id = " . $this->attributes['parentid'])->one() : NULL;
                    
                        // generate treecode
                        // treecode = treecode parent (jika ada) + kode jabatan baru. separator kode menggunakan titik
                        $old_treecode = $this->treecode;
                        $this->treecode = $parent ? $parent->attributes['treecode'] . '.' . $this->kode : $this->kode;
                    
                        // jika parent tidak dipilih, set parentid = null
                        // jika parent dipilih, sesuaikan treecode level jabatan lain di bawah jabatan yang diubah
                        if (!isset($parent) || is_null($parent)) {
                            $this->parentid = NULL;
                        }
                    
                        // update treecode level jabatan lain di bawah jabatan yang diubah
                        $sql = "UPDATE " . self::tableName() . " SET treecode = REPLACE(treecode, '$old_treecode', '$this->treecode') WHERE treecode LIKE '$old_treecode%'";
                        $connection->createCommand($sql)->execute();
                    }
                }
            
                $result = parent::save($runValidation, $attributeNames);
                $transaction->commit();
            
                return $result;
            }catch (Exception $e){
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
        
        /**
         * Ambil struktur jabatan di atas jabatan ybs dan merupakan approver.
         * Jika tidak ditemukan jabatan di atasnya yang merupakan approver, cek apakah jabatan ybs merupakan approver atau bukan.
         * Jika ya, kembalikan jabatan ybs. Jika tidak, kembalikan null
         *
         * @return Jabatan|null
         * @throws Exception
         */
        public function getJabatanAprover() {
            try {
                $approver = NULL;
                
                if ($this->approvalto == self::APPROVALTO_SDM) {
                    $approver = Jabatan::find()->andWhere("kode = '" . self::KODE_JABATAN_SDM . "'")->one();
                } else {
                    $code_exploded = explode(".", $this->treecode);
                    $parents = ArrayHelper::index(Jabatan::find()->andWhere("kode IN ('" . implode("','", $code_exploded) . "')")->all(), 'kode');
    
                    $j = count($code_exploded) - 2;
                    $isApproverFound = FALSE;
                    
                    while ($j >= 0 && !$isApproverFound) {
                        /** @var Jabatan $parent */
                        $parent = $parents[$code_exploded[$j]];
                        if ($parent->getAttribute('isapprover') == 1) {
                            $isApproverFound = TRUE;
                            $approver = $parent;
                        }
                        $j--;
                    }
                    if (!$isApproverFound && $this->getAttribute("isapprover") == 1) $approver = $this;
                }
                
                return $approver;
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
                throw $e;
            }
        }
    }
