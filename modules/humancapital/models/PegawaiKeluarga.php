<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiKeluargaQuery;
    use app\modules\master\models\Referensi;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;

    /**
     * This is the model class for table "hcm_pegawai_keluarga".
     *
     * @property int     $id                 Primary key dari tabel
     * @property int     $pegawaiid          ID pegawai
     * @property string  $nama               Nama keluarga
     * @property string  $tgllahir           Tanggal lahir
     * @property string  $tempatlahir        Tempat lahir
     * @property string  $jeniskelamin       Jenis kelamin
     * @property string  $hubungan           Hubungan keluarga
     * @property string  $noktp              Nomor KTP
     * @property string  $bpjskesnomor       Nomor BPJS kesehatan
     * @property string  $bpjskeskodefaskes1 Kode faskes 1 BPJS kesehatan
     * @property string  $bpjskesnamafaskes1 Nama faskes 1 BPJS kesehatan
     * @property string  $bpjskodedogi       Kode dokter gigi BPJS kesehatan
     * @property string  $bpjsnamadogi       Nama dokter gigi BPJS kesehatan
     * @property int     $createuser         ID user yang membuat data
     * @property string  $createtime         Waktu data dibuat
     * @property int     $modifieduser       ID user yang terakhir melakukan perubahan data
     * @property string  $modifiedtime       Waktu terakhir data diubah
     * @property int     $isdeleted          Status data dihapus
     * @property int     $deleteduser        ID user yang menghapus data
     * @property string  $deletedtime        Waktu penghapusan data
     *
     * @property Pegawai $pegawai
     */
    class PegawaiKeluarga extends ActiveRecord {
        const JENIS_KELAMIN_PRIA = 'L';
        const JENIS_KELAMIN_WANITA = 'P';
        
        const HUBUNGAN_ISTRI = 'HKL01';
        const HUBUNGAN_SUAMI = 'HKL02';
        const HUBUNGAN_ANAK = 'HKL03';
    
        /**
         * Pilihan hubungan keluarga beserta label
         *
         * @return array
         */
        public static function getJenisWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_HCM_HUBUNGANKELUARGA))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai_keluarga';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['pegawaiid', 'nama'], 'required'],
                [['pegawaiid', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['tgllahir', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama', 'tempatlahir', 'bpjskesnamafaskes1', 'bpjsnamadogi'], 'string', 'max' => 255],
                [['jeniskelamin'], 'string', 'max' => 1],
                [['hubungan'], 'string', 'max' => 5],
                [['noktp'], 'string', 'max' => 50],
                [['bpjskesnomor', 'bpjskeskodefaskes1', 'bpjskodedogi'], 'string', 'max' => 100],
                [['pegawaiid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pegawaiid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                 => Yii::t('hcm_pegawai_keluarga', 'ID'),
                'pegawaiid'          => Yii::t('hcm_pegawai_keluarga', 'ID Pegawai'),
                'nama'               => Yii::t('hcm_pegawai_keluarga', 'Nama Keluarga'),
                'tgllahir'           => Yii::t('hcm_pegawai_keluarga', 'Tangagl Lahir'),
                'tempatlahir'        => Yii::t('hcm_pegawai_keluarga', 'Tempat Lahir'),
                'jeniskelamin'       => Yii::t('hcm_pegawai_keluarga', 'Jenis Kelamin'),
                'hubungan'           => Yii::t('hcm_pegawai_keluarga', 'Hubungan Keluarga'),
                'noktp'              => Yii::t('hcm_pegawai_keluarga', 'Nomor KTP'),
                'bpjskesnomor'       => Yii::t('hcm_pegawai_keluarga', 'No BPJS'),
                'bpjskeskodefaskes1' => Yii::t('hcm_pegawai_keluarga', 'Kode Faskes 1'),
                'bpjskesnamafaskes1' => Yii::t('hcm_pegawai_keluarga', 'Nama Faskes 1'),
                'bpjskodedogi'       => Yii::t('hcm_pegawai_keluarga', 'Kode Dokter Gigi'),
                'bpjsnamadogi'       => Yii::t('hcm_pegawai_keluarga', 'Nama Dokter Gigi'),
                'createuser'         => Yii::t('hcm_pegawai_keluarga', 'Createuser'),
                'createtime'         => Yii::t('hcm_pegawai_keluarga', 'Createtime'),
                'modifieduser'       => Yii::t('hcm_pegawai_keluarga', 'Modifieduser'),
                'modifiedtime'       => Yii::t('hcm_pegawai_keluarga', 'Modifiedtime'),
                'isdeleted'          => Yii::t('hcm_pegawai_keluarga', 'Isdeleted'),
                'deleteduser'        => Yii::t('hcm_pegawai_keluarga', 'Deleteduser'),
                'deletedtime'        => Yii::t('hcm_pegawai_keluarga', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawai() {
            return $this->hasOne(Pegawai::className(), ['id' => 'pegawaiid']);
        }
        
        /**
         * @inheritdoc
         * @return PegawaiKeluargaQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiKeluargaQuery(get_called_class());
        }
    }
