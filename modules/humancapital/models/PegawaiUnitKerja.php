<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiUnitKerjaQuery;
    use app\modules\master\models\UnitKerja;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "hcm_pegawai_unitkerja".
     *
     * @property int       $id Primary key dari tabel
     * @property int       $pegawaiid ID pegawai
     * @property int       $unitkerjaid ID unit kerja
     * @property string    $nomorpenempatan Nomor SK penempatan
     * @property string    $tglpenempatan Tanggal penempatan
     * @property string    $tglmulaiefektif Tanggal mulai efektif
     * @property string    $tglakhirefektif Tanggal selesai efektif
     *
     * @property Pegawai   $pegawai
     * @property UnitKerja $unitkerja
     */
    class PegawaiUnitKerja extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai_unitkerja';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['pegawaiid', 'unitkerjaid', 'tglpenempatan', 'tglmulaiefektif'], 'required'],
                [['pegawaiid', 'unitkerjaid'], 'integer'],
                [['tglpenempatan', 'tglmulaiefektif', 'tglakhirefektif'], 'safe'],
                [['nomorpenempatan'], 'string', 'max' => 255],
                [['pegawaiid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pegawaiid' => 'id']],
                [['unitkerjaid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => UnitKerja::className(), 'targetAttribute' => ['unitkerjaid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'              => Yii::t('hcm_pegawai_unitkerja', 'ID'),
                'pegawaiid'       => Yii::t('hcm_pegawai_unitkerja', 'ID Pegawai'),
                'unitkerjaid'     => Yii::t('hcm_pegawai_unitkerja', 'ID Unit Kerja'),
                'nomorpenempatan' => Yii::t('hcm_pegawai_unitkerja', 'Nomor Penempatan'),
                'tglpenempatan'   => Yii::t('hcm_pegawai_unitkerja', 'Tanggal Penempatan'),
                'tglmulaiefektif' => Yii::t('hcm_pegawai_unitkerja', 'Tanggal Mulai Efektir'),
                'tglakhirefektif' => Yii::t('hcm_pegawai_unitkerja', 'Tanggal Akhir Efektir'),
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
        public function getUnitkerja() {
            return $this->hasOne(UnitKerja::className(), ['id' => 'unitkerjaid']);
        }
        
        /**
         * @inheritdoc
         * @return PegawaiUnitKerjaQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiUnitKerjaQuery(get_called_class());
        }
    }
