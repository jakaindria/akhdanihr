<?php
    
    namespace app\modules\system\models;
    
    use app\modules\humancapital\models\Pegawai;
    use app\modules\master\models\UnitKerja;
    use app\modules\system\models\query\TodoQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "sys_todo".
     *
     * @property int       $id           Primary key dari tabel
     * @property string    $tipetarget   Tipe target todo apakah user atau jabatan
     * @property string    $roleid       ID role, jika tipe target jabatan
     * @property int       $unitid       ID unit, jika tipe target jabatan dan jabatan tsb terkait ke unit kerja
     * @property int       $targetid     ID pegawai yang diassign, jika tipetarget user
     * @property int       $pembuatid    ID pegawai pembuat penugasan
     * @property string    $reftable     Tabel referensi
     * @property string    $refid        ID referensi
     * @property string    $refurl       URL referensi
     * @property string    $konten       Konten penugasan
     * @property string    $createtime   Waktu penugasan dibuat
     * @property string    $completetime Waktu penugasan diselesaikan
     * @property string    $status       Status penugasan
     *
     * @property Role      $role
     * @property UnitKerja $unit
     * @property Pegawai   $target
     * @property Pegawai   $pembuat
     */
    class Todo extends ActiveRecord {
        const TARGET_USER = 'USER';
        const TARGET_JABATAN = 'JABATAN';
        const STATUS_NEW = 'NEW';
        const STATUS_COMPLETED = 'COMPLETED';
        const STATUS_DELETED = 'DELETED';
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_todo';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['tipetarget', 'konten'], 'required'],
                [['unitid', 'targetid', 'pembuatid'], 'integer'],
                [['createtime', 'completetime'], 'safe'],
                [['tipetarget', 'status'], 'string', 'max' => 10],
                [['roleid'], 'string', 'max' => 64],
                [['reftable', 'refid', 'refurl', 'konten'], 'string', 'max' => 255],
                [['roleid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Role::className(), 'targetAttribute' => ['roleid' => 'id']],
                [['unitid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => UnitKerja::className(), 'targetAttribute' => ['unitid' => 'id']],
                [['targetid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['targetid' => 'id']],
                [['pembuatid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['pembuatid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('system_todo', 'ID'),
                'tipetarget'   => Yii::t('system_todo', 'Tipe Target'),
                'roleid'       => Yii::t('system_todo', 'Role'),
                'unitid'       => Yii::t('system_todo', 'Unit'),
                'targetid'     => Yii::t('system_todo', 'User yang diassign'),
                'pembuatid'    => Yii::t('system_todo', 'User yang membuat'),
                'reftable'     => Yii::t('system_todo', 'Tabel referensi'),
                'refid'        => Yii::t('system_todo', 'ID referenso'),
                'refurl'       => Yii::t('system_todo', 'URL referensi'),
                'konten'       => Yii::t('system_todo', 'Konten'),
                'createtime'   => Yii::t('system_todo', 'Waktu dibuat'),
                'completetime' => Yii::t('system_todo', 'Waktu diselesaikan'),
                'status'       => Yii::t('system_todo', 'Status'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getRole() {
            return $this->hasOne(Role::className(), ['id' => 'roleid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUnit() {
            return $this->hasOne(UnitKerja::className(), ['id' => 'unitid']);
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
         * @return TodoQuery the active query used by this AR class.
         */
        public static function find() {
            return new TodoQuery(get_called_class());
        }
    }
