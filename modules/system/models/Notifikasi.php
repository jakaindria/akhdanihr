<?php
    
    namespace app\modules\system\models;
    
    use app\modules\humancapital\models\Pegawai;
    use app\modules\system\models\query\NotifikasiQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "sys_notifikasi".
     *
     * @property string  $id         Primary key dari tabel
     * @property string  $tipe       Tipe notifikasi
     * @property string  $reftable   Tabel referensi
     * @property string  $refid      ID referensi
     * @property string  $refurl     URL referensi
     * @property string  $konten     Konten notifikasi
     * @property int     $isread     Status notifikasi sudah dibaca atau belum
     * @property int     $targetid   ID pegawai yang dituju
     * @property int     $pembuatid  ID pegawai pembuat
     * @property string  $createtime Waktu notifikasi dibuat
     * @property string  $readtime   Waktu notifikasi dibaca
     *
     * @property Pegawai $target     Pegawai tujuan
     * @property Pegawai $pembuat    Pegawai pembuat
     */
    class Notifikasi extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_notifikasi';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['tipe', 'konten'], 'required'],
                [['isread', 'targetid', 'pembuatid'], 'integer'],
                [['createtime', 'readtime'], 'safe'],
                [['tipe', 'reftable', 'refid', 'refurl', 'konten'], 'string', 'max' => 255],
                [['targetid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['targetid' => 'id']],
                [['pembuatid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pembuatid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'         => Yii::t('system_notifikasi', 'ID'),
                'tipe'       => Yii::t('system_notifikasi', 'Tipe'),
                'reftable'   => Yii::t('system_notifikasi', 'Tabel Referensi'),
                'refid'      => Yii::t('system_notifikasi', 'ID Referensi'),
                'refurl'     => Yii::t('system_notifikasi', 'URL'),
                'konten'     => Yii::t('system_notifikasi', 'Konten'),
                'isread'     => Yii::t('system_notifikasi', 'Sudah Dibaca'),
                'targetid'   => Yii::t('system_notifikasi', 'Pegawai Tujuan'),
                'pembuatid'  => Yii::t('system_notifikasi', 'Pembuat'),
                'createtime' => Yii::t('system_notifikasi', 'Waktu Dibuat'),
                'readtime'   => Yii::t('system_notifikasi', 'Waktu Dibaca'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getTarget() {
            return $this->hasOne(Pegawai::className(), ['id' => 'targetid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPembuat() {
            return $this->hasOne(Pegawai::className(), ['id' => 'pembuatid']);
        }
        
        /**
         * @inheritdoc
         * @return NotifikasiQuery the active query used by this AR class.
         */
        public static function find() {
            return new NotifikasiQuery(get_called_class());
        }
    }
