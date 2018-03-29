<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\ReferensiQuery;
    use Yii;
    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "mst_referensi".
     *
     * @property string $nilai    Nilai referensi. Primary key table
     * @property string $kategori Kategori referensi
     * @property string $nama     Nama referensi
     * @property int    $issystem Flag apakah referensi berpengaruh ke sistem
     * @property int    $isactive Status aktif
     */
    class Referensi extends ActiveRecord {
        const KATEGORI_MST_JENISKONTAK = 'MST_JENISKONTAK';
        const KATEGORI_MST_ASALKONTAK = 'MST_ASALKONTAK';
        const KATEGORI_MST_KLASIFIKASIKONTAK = 'MST_KLASIFIKASIKONTAK';
        const KATEGORI_HCM_JENISPEGAWAI = 'HCM_JENISPEGAWAI';
        const KATEGORI_HCM_AGAMA = 'HCM_AGAMA';
        const KATEGORI_HCM_STATUSNIKAH = 'HCM_STATUSNIKAH';
        const KATEGORI_HCM_STATUSNIKAHPAJAK = 'HCM_STATUSNIKAHPAJAK';
        const KATEGORI_HCM_HUBUNGANKELUARGA = 'HCM_HUBUNGANKELUARGA';
        const KATEGORI_ORG_STATUSKEPEMILIKANALAT = 'ORG_STATUSKEPEMILIKANALAT';
        const KATEGORI_ORG_KONDISIPERALATAN = 'ORG_KONDISIPERALATAN';
        const KATEGORI_ORG_KUALIFIKASIIZINUSAHA = 'ORG_KUALIFIKASIIZINUSAHA';
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_referensi';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kategori'], 'required'],
                [['issystem', 'isactive'], 'integer'],
                [['kategori', 'nama'], 'string', 'max' => 100],
                [['nilai'], 'string', 'max' => 255],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'kategori' => Yii::t('master_referensi', 'Kategori'),
                'nama'     => Yii::t('master_referensi', 'Nama'),
                'nilai'    => Yii::t('master_referensi', 'Nilai'),
                'issystem' => Yii::t('master_referensi', 'Referensi Sistem'),
                'isactive' => Yii::t('master_referensi', 'Status Aktif'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return ReferensiQuery the active query used by this AR class.
         */
        public static function find() {
            return new ReferensiQuery(get_called_class());
        }
    }
