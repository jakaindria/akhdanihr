<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiQuery;
    use app\modules\master\models\Kota;
    use app\modules\master\models\Referensi;
    use app\modules\system\models\Notifikasi;
    use app\modules\system\models\Todo;
    use app\modules\system\models\User;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;

    /**
     * This is the model class for table "hcm_pegawai".
     *
     * @property int                  $id                      Primary key dari tabel
     * @property int                  $userid                  ID User
     * @property string               $nip                     NIP
     * @property string               $nama                    Nama
     * @property string               $jenis                   Jenis pegawai
     * @property string               $tglmasukkerja           Tanggal masuk kerja
     * @property string               $tglpengangkatan         Tanggal pengangkatan
     * @property string               $tglmulaikontrak         Tanggal mulai kontrak (khusus pegawai kontrak)
     * @property string               $tglakhirkontrak         Tanggal akhir kontrak (khusus pegawai kontrak)
     * @property string               $tempatlahir             Tempat lahir
     * @property string               $tgllahir                Tanggal lahir
     * @property string               $jeniskelamin            Jenis Kelamin
     * @property string               $agama                   Agama
     * @property string               $statusnikah             Status nikah
     * @property string               $noktp                   Nomor KTP
     * @property string               $npwp                    NPWP
     * @property string               $alamatktp               Alamat sesuai KTP
     * @property string               $kelurahanktp            Nama kelurahan sesuai KTP
     * @property string               $kecamatanktp            Nama kecamatan  sesuai KTP
     * @property int                  $kotaktpid               ID kota sesuai KTP
     * @property string               $alamattinggal           Alamat tinggal
     * @property string               $kelurahantinggal        Nama kelurahan tempat tinggal
     * @property string               $kecamatantinggal        Nama kecamatan tempat tinggal
     * @property int                  $kotatinggalid           ID kota tempat tinggal
     * @property string               $email                   Email perusahaan
     * @property string               $emailpribadi            Email pribadi
     * @property string               $hp                      Nomor HP
     * @property string               $telepon                 Nomor telepon
     * @property string               $nomorrekening           Nomor rekening
     * @property string               $pajakstatusnikah        Status nikah pajak
     * @property int                  $pajakjumlahtanggungan   Jumlah tanggungan pajak
     * @property string               $bpjskesnomor            Nomor BPJS kesehatan
     * @property string               $bpjskeskodefaskes1      Kode faskes tingkat 1 BPJS kesehatan
     * @property string               $bpjskesnamafaskes1      Nama faskes tingkat 1 BPJS kesehatan
     * @property string               $bpjskodedogi            Kode dokter gigi BPJS kesehatan
     * @property string               $bpjsnamadogi            Nama dokter gigi BPJS kesehatan
     * @property int                  $isactive                Status aktif
     * @property int                  $createuser              ID user yang membuat data
     * @property string               $createtime              Waktu data dibuat
     * @property int                  $modifieduser            ID user yang terakhir melakukan perubahan data
     * @property string               $modifiedtime            Waktu terakhir data diubah
     * @property int                  $isdeleted               Status data dihapus
     * @property int                  $deleteduser             ID user yang menghapus data
     * @property string               $deletedtime             Waktu penghapusan data
     *
     * @property HistoryKepegawaian[] $historyKepegawaians
     * @property Kota                 $kotaKTP
     * @property Kota                 $kotaTinggal
     * @property User                 $user
     * @property PegawaiGrade[]       $pegawaiGrades
     * @property PegawaiJabatan[]     $pegawaiJabatans
     * @property PegawaiKeluarga[]    $pegawaiKeluargas
     * @property PegawaiPendidikan[]  $pegawaiPendidikans
     * @property PegawaiUnitkerja[]   $pegawaiUnitkerjas
     * @property Notifikasi[]         $notifikasis
     * @property Todo[]               $todos
     */
    class Pegawai extends ActiveRecord {
        /**
         * Pegawai yang sudah keluar bukan karena pensiun
         */
        const JENIS_PEGAWAI_KELUAR = 'PEG00';
        /**
         * Pegawai tetap
         */
        const JENIS_PEGAWAI_TETAP = 'PEG01';
        /**
         * Pegawai kontrak
         */
        const JENIS_PEGAWAI_KONTRAK = 'PEG02';
        /**
         * Pegawai dalam masa penilaian (probation)
         */
        const JENIS_PEGAWAI_PDMP = 'PEG03';
        /**
         * Pegawai pasif / cuti di luar tanggungan
         */
        const JENIS_PEGAWAI_PASIF = 'PEG04';
        /**
         * Pegawai outsource
         */
        const JENIS_PEGAWAI_OUTSOURCE = 'PEG05';
        /**
         * Pegawai yang sudah pensiun
         */
        const JENIS_PEGAWAI_PENSIUN = 'PEG06';
        /**
         * Pegawai magang
         */
        const JENIS_PEGAWAI_MAGANG = 'PEG07';
        
        
        const JENIS_KELAMIN_PRIA = 'L';
        const JENIS_KELAMIN_WANITA = 'P';
        
        const AGAMA_ISLAM = 'AGM01';
        const AGAMA_PROTESTAN = 'AGM02';
        const AGAMA_KATOLIK = 'AGM03';
        const AGAMA_HINDU = 'AGM04';
        const AGAMA_BUDHA = 'AGM05';
        const AGAMA_KONGHUCHU = 'AGM06';
    
        const STATUS_NIKAH_BELUM_MENIKAH = 'SNK01';
        const STATUS_NIKAH_MENIKAH = 'SNK02';
        const STATUS_NIKAH_DUDA_JANDA = 'SNK03';
        
        const STATUS_NIKAH_PAJAK_KAWIN = 'PSN01';
        const STATUS_NIKAH_PAJAK_TIDAK_KAWIN = 'PSN02';
        const STATUS_NIKAH_PAJAK_BERPISAH = 'PSN03';
        const STATUS_NIKAH_PAJAK_PISAH_HARTA = 'PSN04';
    
        /**
         * Pilihan jenis pegawai beserta label
         *
         * @return array
         */
        public static function getJenisPegawaiWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_HCM_JENISPEGAWAI))->active()->all(), 'nilai', 'nama');
        }
    
        /**
         * Pilihan agama beserta label
         *
         * @return array
         */
        public static function getAgamaWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_HCM_AGAMA))->active()->all(), 'nilai', 'nama');
        }
    
        /**
         * Pilihan status nikah beserta label
         *
         * @return array
         */
        public static function getStatusNikahWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_HCM_STATUSNIKAH))->active()->all(), 'nilai', 'nama');
        }
    
        /**
         * Pilihan status nikah pajak beserta label
         *
         * @return array
         */
        public static function getStatusNikahPajakWithLabel() {
            return ArrayHelper::map(Referensi::find()->andWhere("kategori = ".Yii::$app->db->quoteValue(Referensi::KATEGORI_HCM_STATUSNIKAHPAJAK))->active()->all(), 'nilai', 'nama');
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['userid', 'kotaktpid', 'kotatinggalid', 'pajakjumlahtanggungan', 'isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nip', 'nama'], 'required'],
                [['tglmasukkerja', 'tglpengangkatan', 'tgllahir', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nip', 'hp', 'telepon', 'bpjskesnomor', 'bpjskeskodefaskes1', 'bpjskodedogi'], 'string', 'max' => 100],
                [['jenis', 'agama', 'statusnikah', 'pajakstatusnikah'], 'string', 'max' => 5],
                [['nama', 'tglmulaikontrak', 'tglakhirkontrak', 'tempatlahir', 'alamatktp', 'kelurahanktp', 'kecamatanktp', 'alamattinggal', 'kelurahantinggal', 'kecamatantinggal', 'email', 'emailpribadi', 'nomorrekening', 'bpjskesnamafaskes1', 'bpjsnamadogi'], 'string', 'max' => 255],
                [['jeniskelamin'], 'string', 'max' => 1],
                [['noktp', 'npwp'], 'string', 'max' => 50],
                [['nip'], 'unique'],
                [['noktp'], 'unique'],
                [['kotaktpid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Kota::className(), 'targetAttribute' => ['kotaktpid' => 'id']],
                [['kotatinggalid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Kota::className(), 'targetAttribute' => ['kotatinggalid' => 'id']],
                [['userid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                    => Yii::t('hcm_pegawai', 'ID'),
                'userid'                => Yii::t('hcm_pegawai', 'Userid'),
                'nip'                   => Yii::t('hcm_pegawai', 'Nip'),
                'nama'                  => Yii::t('hcm_pegawai', 'Nama'),
                'jenis'                 => Yii::t('hcm_pegawai', 'Jenis'),
                'tglmasukkerja'         => Yii::t('hcm_pegawai', 'Tanggal Masuk Kerja'),
                'tglpengangkatan'       => Yii::t('hcm_pegawai', 'Tanggal Pengangkatan'),
                'tglmulaikontrak'       => Yii::t('hcm_pegawai', 'Tanggal Mulai Kontrak'),
                'tglakhirkontrak'       => Yii::t('hcm_pegawai', 'Tanggal Akhir Kontrak'),
                'tempatlahir'           => Yii::t('hcm_pegawai', 'Tempat Lahir'),
                'tgllahir'              => Yii::t('hcm_pegawai', 'Tanggal Lahir'),
                'jeniskelamin'          => Yii::t('hcm_pegawai', 'Jenis Kelamin'),
                'agama'                 => Yii::t('hcm_pegawai', 'Agama'),
                'statusnikah'           => Yii::t('hcm_pegawai', 'Status Nikah'),
                'noktp'                 => Yii::t('hcm_pegawai', 'No KTP'),
                'npwp'                  => Yii::t('hcm_pegawai', 'NPWP'),
                'alamatktp'             => Yii::t('hcm_pegawai', 'Alamat KTP'),
                'kelurahanktp'          => Yii::t('hcm_pegawai', 'Kelurahan KTP'),
                'kecamatanktp'          => Yii::t('hcm_pegawai', 'Kecamatan KTP'),
                'kotaktpid'             => Yii::t('hcm_pegawai', 'Kota KTP'),
                'alamattinggal'         => Yii::t('hcm_pegawai', 'Alamat Tinggal'),
                'kelurahantinggal'      => Yii::t('hcm_pegawai', 'Kelurahan Tinggal'),
                'kecamatantinggal'      => Yii::t('hcm_pegawai', 'Kecamatan Tinggal'),
                'kotatinggalid'         => Yii::t('hcm_pegawai', 'Kota Tinggal'),
                'email'                 => Yii::t('hcm_pegawai', 'Email'),
                'emailpribadi'          => Yii::t('hcm_pegawai', 'Email Pribadi'),
                'hp'                    => Yii::t('hcm_pegawai', 'Nomor HP'),
                'telepon'               => Yii::t('hcm_pegawai', 'Telepon'),
                'nomorrekening'         => Yii::t('hcm_pegawai', 'Nomor Rekening'),
                'pajakstatusnikah'      => Yii::t('hcm_pegawai', 'Status Nikah Pajak'),
                'pajakjumlahtanggungan' => Yii::t('hcm_pegawai', 'Jumlah Tanggungan Pajak'),
                'bpjskesnomor'          => Yii::t('hcm_pegawai', 'Nomor BPJS'),
                'bpjskeskodefaskes1'    => Yii::t('hcm_pegawai', 'Kode Faskes 1 BPJS'),
                'bpjskesnamafaskes1'    => Yii::t('hcm_pegawai', 'Nama Faskes 1 BPJS'),
                'bpjskodedogi'          => Yii::t('hcm_pegawai', 'Kode Dokter Gigi BPJS'),
                'bpjsnamadogi'          => Yii::t('hcm_pegawai', 'Nama Dokter Gigi BPJS'),
                'isactive'              => Yii::t('hcm_pegawai', 'Status Aktif'),
                'createuser'            => Yii::t('hcm_pegawai', 'Createuser'),
                'createtime'            => Yii::t('hcm_pegawai', 'Createtime'),
                'modifieduser'          => Yii::t('hcm_pegawai', 'Modifieduser'),
                'modifiedtime'          => Yii::t('hcm_pegawai', 'Modifiedtime'),
                'isdeleted'             => Yii::t('hcm_pegawai', 'Isdeleted'),
                'deleteduser'           => Yii::t('hcm_pegawai', 'Deleteduser'),
                'deletedtime'           => Yii::t('hcm_pegawai', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getHistoryKepegawaians() {
            return $this->hasMany(HistoryKepegawaian::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getKotaKTP() {
            return $this->hasOne(Kota::className(), ['id' => 'kotaktpid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getKotaTinggal() {
            return $this->hasOne(Kota::className(), ['id' => 'kotatinggalid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUser() {
            return $this->hasOne(User::className(), ['id' => 'userid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiGrades() {
            return $this->hasMany(PegawaiGrade::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiJabatans() {
            return $this->hasMany(PegawaiJabatan::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiKeluargas() {
            return $this->hasMany(PegawaiKeluarga::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiPendidikans() {
            return $this->hasMany(PegawaiPendidikan::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawaiUnitkerjas() {
            return $this->hasMany(PegawaiUnitkerja::className(), ['pegawaiid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getNotifikasis() {
            return $this->hasMany(Notifikasi::className(), ['targetid' => 'id']);
        }
        
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getTodos() {
            return $this->hasMany(Todo::className(), ['targetid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return PegawaiQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiQuery(get_called_class());
        }
    }
