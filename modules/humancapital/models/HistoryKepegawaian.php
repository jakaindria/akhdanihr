<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\HistoryKepegawaianQuery;
    use app\modules\master\models\Grade;
    use app\modules\master\models\Jabatan;
    use app\modules\master\models\UnitKerja;
    use Yii;
    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "hcm_history_kepegawaian".
     *
     * @property int       $id          Primary key dari tabel
     * @property int       $pegawaiid   ID Pegawai
     * @property int       $gradeid     ID Grade
     * @property int       $jabatanid   ID Jabatan
     * @property int       $unitkerjaid ID Unit Kerja
     * @property string    $tanggal     Tanggal Entry
     * @property string    $status      Status Data
     *
     * @property Pegawai   $pegawai
     * @property Grade     $grade
     * @property Jabatan   $jabatan
     * @property UnitKerja $unitkerja
     */
    class HistoryKepegawaian extends ActiveRecord {
        const STATUS_ACTIVE = 'ACTIVE';
        const STATUS_DELETED = 'DELETED';
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_history_kepegawaian';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['pegawaiid', 'gradeid', 'jabatanid', 'unitkerjaid'], 'integer'],
                [['tanggal'], 'safe'],
                [['status'], 'string', 'max' => 10],
                [['pegawaiid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pegawaiid' => 'id']],
                [['gradeid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Grade::className(), 'targetAttribute' => ['gradeid' => 'id']],
                [['jabatanid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatanid' => 'id']],
                [['unitkerjaid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => UnitKerja::className(), 'targetAttribute' => ['unitkerjaid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'          => Yii::t('hcm_history_pegawai', 'ID'),
                'pegawaiid'   => Yii::t('hcm_history_pegawai', 'ID Pegawai'),
                'gradeid'     => Yii::t('hcm_history_pegawai', 'ID Grade'),
                'jabatanid'   => Yii::t('hcm_history_pegawai', 'ID Jabatan'),
                'unitkerjaid' => Yii::t('hcm_history_pegawai', 'ID Unit Kerja'),
                'tanggal'     => Yii::t('hcm_history_pegawai', 'Tanggal Entry'),
                'status'      => Yii::t('hcm_history_pegawai', 'Status Data'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawai() {
            return $this->hasOne(Pegawai::className(), ['id' => 'pegawaiid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getGrade() {
            return $this->hasOne(Grade::className(), ['id' => 'gradeid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getJabatan() {
            return $this->hasOne(Jabatan::className(), ['id' => 'jabatanid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUnitkerja() {
            return $this->hasOne(UnitKerja::className(), ['id' => 'unitkerjaid']);
        }
        
        /**
         * @inheritdoc
         * @return HistoryKepegawaianQuery the active query used by this AR class.
         */
        public static function find() {
            return new HistoryKepegawaianQuery(get_called_class());
        }
    }
