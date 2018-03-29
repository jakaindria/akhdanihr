<?php
    
    namespace app\modules\system\models;
    
    use app\modules\master\models\UnitKerja;
    use app\modules\system\models\query\UserRoleQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "sys_userrole".
     *
     * @property int       $userid      ID user
     * @property string    $roleid      ID role
     * @property int       $unitkerjaid ID unit kerja, jika role terkait ke unit kerja
     *
     * @property User      $user
     * @property Role      $role
     * @property UnitKerja $unitkerja
     */
    class UserRole extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_userrole';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['userid', 'roleid'], 'required'],
                [['userid', 'unitkerjaid'], 'integer'],
                [['roleid'], 'string', 'max' => 64],
                [['userid'], 'unique'],
                [['userid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
                [['roleid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Role::className(), 'targetAttribute' => ['roleid' => 'id']],
                [['unitkerjaid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => UnitKerja::className(), 'targetAttribute' => ['unitkerjaid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'userid'      => Yii::t('system_role', 'Userid'),
                'roleid'      => Yii::t('system_role', 'Roleid'),
                'unitkerjaid' => Yii::t('system_role', 'Unitkerjaid'),
            ];
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
        public function getRole() {
            return $this->hasOne(Role::className(), ['id' => 'roleid']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUnitkerja() {
            return $this->hasOne(UnitKerja::className(), ['id' => 'unitkerjaid']);
        }
        
        /**
         * @inheritdoc
         * @return UserRoleQuery the active query used by this AR class.
         */
        public static function find() {
            return new UserRoleQuery(get_called_class());
        }
    }
