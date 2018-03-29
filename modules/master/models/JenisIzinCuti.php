<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\JenisIzinCutiQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "mst_jenis_izincuti".
     *
     * @property int    $id                Primary key data jenis izin cuti
     * @property string $nama              Nama jenis izin cuti
     * @property string $tipe              Tipe (IZIN / CUTI)
     * @property string $hitungberdasarkan Perhitungan durasi berdasarkan hari kalender atau hari kerja
     * @property int    $createuser        ID user yang membuat data
     * @property string $createtime        Waktu data dibuat
     * @property int    $modifieduser      ID user yang terakhir melakukan perubahan data
     * @property string $modifiedtime      Waktu terakhir data diubah
     * @property int    $isdeleted         Status data dihapus
     * @property int    $deleteduser       ID user yang menghapus data
     * @property string $deletedtime       Waktu penghapusan data
     */
    class JenisIzinCuti extends ActiveRecord {
        /**
         * Izin
         */
        const TIPE_IZIN = 'IZIN';
        /**
         * Cuti
         */
        const TIPE_CUTI = 'CUTI';
        /**
         * Hitung durasi berdasarkan hari kerja (senin sampai jumat)
         */
        const HITUNG_BERDASARKAN_HARIKERJA = 'HARIKERJA';
        /**
         * Hitung durasi berdsarkan hari kalender (termasuk hari libur)
         */
        const HITUNG_BERDASARKAN_HARIKALENDER = 'KALENDER';
        
        /**
         * Pilihan tipe apakah izin atau cuti
         *
         * @return array
         */
        public static function getTipeWithLabel() {
            return [
                JenisIzinCuti::TIPE_IZIN => Yii::t('master_jabatan', 'Izin'),
                JenisIzinCuti::TIPE_CUTI => Yii::t('master_jabatan', 'Cuti')
            ];
        }
        
        /**
         * Pilihan perhitungan durasi izin / cuti
         *
         * @return array
         */
        public static function getHitungDurasiWithLabel() {
            return [
                JenisIzinCuti::HITUNG_BERDASARKAN_HARIKERJA    => Yii::t('master_jabatan', 'Hari Kerja'),
                JenisIzinCuti::HITUNG_BERDASARKAN_HARIKALENDER => Yii::t('master_jabatan', 'Hari Kalender')
            ];
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_jenis_izincuti';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['hitungberdasarkan'], 'required'],
                [['createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama'], 'string', 'max' => 255],
                [['tipe'], 'string', 'max' => 10],
                [['hitungberdasarkan'], 'string', 'max' => 20],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                => Yii::t('master_jenisizincuti', 'ID'),
                'nama'              => Yii::t('master_jenisizincuti', 'Nama'),
                'tipe'              => Yii::t('master_jenisizincuti', 'Tipe'),
                'hitungberdasarkan' => Yii::t('master_jenisizincuti', 'Durasi Berdasarkan'),
                'createuser'        => Yii::t('master_jenisizincuti', 'Createuser'),
                'createtime'        => Yii::t('master_jenisizincuti', 'Createtime'),
                'modifieduser'      => Yii::t('master_jenisizincuti', 'Modifieduser'),
                'modifiedtime'      => Yii::t('master_jenisizincuti', 'Modifiedtime'),
                'isdeleted'         => Yii::t('master_jenisizincuti', 'Isdeleted'),
                'deleteduser'       => Yii::t('master_jenisizincuti', 'Deleteduser'),
                'deletedtime'       => Yii::t('master_jenisizincuti', 'Deletedtime'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return JenisIzinCutiQuery the active query used by this AR class.
         */
        public static function find() {
            return new JenisIzinCutiQuery(get_called_class());
        }
    }
