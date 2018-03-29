<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiPendidikanQuery;
    use app\modules\master\models\Universitas;
    use Yii;
    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "hcm_pegawai_pendidikan".
     *
     * @property int            $id            Primary key dari tabel
     * @property int            $pegawaiid     ID pegawai
     * @property int            $universitasid ID universitas
     * @property string         $gelar         Gelar
     * @property string         $jenjang       Jenjang pendidikan
     * @property string         $fakultas      Fakultas
     * @property string         $jurusan       Jurusan
     * @property string         $nomorijazah   Nomor ijazah
     * @property string         $tglijazah     Tanggal ijazah
     * @property int            $tahunmasuk    Tahun masuk
     * @property int            $tahunlulus    Tahun lulus
     * @property string         $ipk           IPK
     * @property string         $predikat      Pradikat lulus
     *
     * @property Pegawai     $pegawai
     * @property Universitas $universitas
     */
    class PegawaiPendidikan extends ActiveRecord {
        const JENJANG_DIPLOMA = 'DIPLOMA';
        const JENJANG_SARJANA = 'SARJANA';
        const JENJANG_MAGISTER = 'MAGISTER';
        const JENJANG_DOKTOR = 'DOKTOR';
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai_pendidikan';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['pegawaiid', 'universitasid'], 'required'],
                [['pegawaiid', 'universitasid', 'tahunmasuk', 'tahunlulus'], 'integer'],
                [['tglijazah'], 'safe'],
                [['ipk'], 'number'],
                [['gelar'], 'string', 'max' => 20],
                [['jenjang', 'fakultas', 'jurusan', 'nomorijazah'], 'string', 'max' => 255],
                [['predikat'], 'string', 'max' => 50],
                [['pegawaiid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pegawaiid' => 'id']],
                [['universitasid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Universitas::className(), 'targetAttribute' => ['universitasid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'            => Yii::t('hcm_pegawai_pendidikan', 'ID'),
                'pegawaiid'     => Yii::t('hcm_pegawai_pendidikan', 'ID Pegawai'),
                'universitasid' => Yii::t('hcm_pegawai_pendidikan', 'ID Universitas'),
                'gelar'         => Yii::t('hcm_pegawai_pendidikan', 'Gelar'),
                'jenjang'       => Yii::t('hcm_pegawai_pendidikan', 'Jenjang'),
                'fakultas'      => Yii::t('hcm_pegawai_pendidikan', 'Fakultas'),
                'jurusan'       => Yii::t('hcm_pegawai_pendidikan', 'Jurusan'),
                'nomorijazah'   => Yii::t('hcm_pegawai_pendidikan', 'Nomor Ijazah'),
                'tglijazah'     => Yii::t('hcm_pegawai_pendidikan', 'Tanggal Ijazah'),
                'tahunmasuk'    => Yii::t('hcm_pegawai_pendidikan', 'Tahun Masuk'),
                'tahunlulus'    => Yii::t('hcm_pegawai_pendidikan', 'Tahun Lulus'),
                'ipk'           => Yii::t('hcm_pegawai_pendidikan', 'IPK'),
                'predikat'      => Yii::t('hcm_pegawai_pendidikan', 'Predikat'),
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
        public function getUniversitas() {
            return $this->hasOne(Universitas::className(), ['id' => 'universitasid']);
        }
        
        /**
         * @inheritdoc
         * @return PegawaiPendidikanQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiPendidikanQuery(get_called_class());
        }
    }
