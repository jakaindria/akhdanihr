<?php
    
    namespace app\modules\org\models;
    
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "org_identitas_perusahaan".
     *
     * @property string $kode  Kode kolom untuk kebutuhan internal aplikasi. Tidak boleh diubah
     * @property string $kolom Label kolom untuk ditampilkan di view
     * @property string $nilai Nilai dari kolom identitas
     */
    class IdentitasPerusahaan extends ActiveRecord {
        const AKTADOCNAME = 'AKTADOCNAME';
        const AKTADOCURL = 'AKTADOCURL';
        const AKTANO = 'AKTANO';
        const AKTANOTARIS = 'AKTANOTARIS';
        const AKTAPDOCNAME = 'AKTAPDOCNAME';
        const AKTAPDOCURL = 'AKTAPDOCURL';
        const AKTAPNO = 'AKTAPNO';
        const AKTAPNOTARIS = 'AKTAPNOTARIS';
        const AKTAPTGL = 'AKTAPTGL';
        const AKTATGL = 'AKTATGL';
        const ALAMAT = 'ALAMAT';
        const EMAIL = 'EMAIL';
        const FAX = 'FAX';
        const KABKOTA = 'KABKOTA';
        const KODEPOS = 'KODEPOS';
        const NAMA = 'NAMA';
        const NOPKP = 'NOPKP';
        const PROVINSI = 'PROVINSI';
        const TELEPON = 'TELEPON';
        const WEBSITE = 'WEBSITE';
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'org_identitas_perusahaan';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode'], 'required'],
                [['kode', 'nilai'], 'string', 'max' => 255],
                [['kolom'], 'string', 'max' => 100],
                [['kode'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'kode'  => Yii::t('org_identitas', 'Kode'),
                'kolom' => Yii::t('org_identitas', 'Kolom'),
                'nilai' => Yii::t('org_identitas', 'Nilai'),
            ];
        }
    }
