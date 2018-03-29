<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiJabatanQuery;
    use app\modules\master\models\Jabatan;
    use Yii;
    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "hcm_pegawai_jabatan".
     *
     * @property int     $id Primary key dari tabel
     * @property int     $jabatanid ID Jabatan
     * @property int     $pegawaiid ID Pegawai
     * @property string  $tglmulai Tanggal mulai menjabat
     * @property string  $tglselesai Tanggal akhir menjabat
     *
     * @property Jabatan $jabatan
     * @property Pegawai $pegawai
     */
    class PegawaiJabatan extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai_jabatan';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['jabatanid', 'pegawaiid', 'tglmulai'], 'required'],
                [['jabatanid', 'pegawaiid'], 'integer'],
                [['tglmulai', 'tglselesai'], 'safe'],
                [['jabatanid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatanid' => 'id']],
                [['pegawaiid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pegawaiid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'         => Yii::t('hcm_pegawai_jabatan', 'ID'),
                'jabatanid'  => Yii::t('hcm_pegawai_jabatan', 'ID Jabatan'),
                'pegawaiid'  => Yii::t('hcm_pegawai_jabatan', 'ID Pegawai'),
                'tglmulai'   => Yii::t('hcm_pegawai_jabatan', 'Tanggal Mulai Menjabat'),
                'tglselesai' => Yii::t('hcm_pegawai_jabatan', 'Tanggal Akhir Menjabat'),
            ];
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
        public function getPegawai() {
            return $this->hasOne(Pegawai::className(), ['id' => 'pegawaiid']);
        }
        
        /**
         * @inheritdoc
         * @return PegawaiJabatanQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiJabatanQuery(get_called_class());
        }
    }
