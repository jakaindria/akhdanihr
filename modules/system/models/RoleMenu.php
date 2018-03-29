<?php
    
    namespace app\modules\system\models;
    
    use app\modules\system\models\query\RoleMenuQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "system_menu".
     *
     * @property string $roleid ID role
     * @property int    $menuid ID menu
     *
     * @property Role   $role   Role
     * @property Menu   $menu   Menu
     */
    class RoleMenu extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'system_menu';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['roleid', 'menuid'], 'required'],
                [['menuid'], 'integer'],
                [['roleid'], 'string', 'max' => 64],
                [['roleid'], 'unique'],
                [['roleid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Role::className(), 'targetAttribute' => ['roleid' => 'id']],
                [['menuid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Menu::className(), 'targetAttribute' => ['menuid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'roleid' => Yii::t('system_menu', 'Role'),
                'menuid' => Yii::t('system_menu', 'Menu'),
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
        public function getMenu() {
            return $this->hasOne(Menu::className(), ['id' => 'menuid']);
        }
        
        /**
         * @inheritdoc
         * @return RoleMenuQuery the active query used by this AR class.
         */
        public static function find() {
            return new RoleMenuQuery(get_called_class());
        }
    }
