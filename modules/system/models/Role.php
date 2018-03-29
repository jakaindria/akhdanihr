<?php
    
    namespace app\modules\system\models;
    
    use app\modules\system\models\query\RoleQuery;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\rbac\Item;
    use yii2mod\rbac\models\AuthItemModel;

    /**
     * This is the model class for table "sys_role".
     *
     * @property string     $id                Primary key dari table
     * @property string     $nama              Nama role
     * @property int        $islinktounitkerja Flag apakah role terkait ke unit kerja
     * @property int        $isbuiltin         Flag jika role merupakan bawaan sistem dan tidak boleh dihapus
     *
     * @property Todo[]     $todos
     * @property UserRole[] $UserRoles
     * @property RoleMenu[] $roleMenus
     */
    class Role extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_role';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id'], 'required'],
                [['islinktounitkerja', 'isbuiltin'], 'integer'],
                [['id'], 'string', 'max' => 64],
                [['nama'], 'string', 'max' => 255],
                [['id'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'                => Yii::t('system_role', 'ID'),
                'nama'              => Yii::t('system_role', 'Nama'),
                'islinktounitkerja' => Yii::t('system_role', 'Terkait Ke Unit Kerja'),
                'isbuiltin'         => Yii::t('system_role', 'Default Aplikasi'),
            ];
        }
    
        /**
         * @inheritdoc
         */
        public function save($runValidation = TRUE, $attributeNames = NULL) {
            if (!parent::save($runValidation, $attributeNames)) return FALSE;
    
            $authItemModel = new AuthItemModel();
            $authItemModel->type = Item::TYPE_ROLE;
            $authItemModel->name = $this->id;
            $authItemModel->description = $this->nama;
    
            return $authItemModel->save();
        }
    
    
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getTodos() {
            return $this->hasMany(Todo::className(), ['roleid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUserRoles() {
            return $this->hasMany(UserRole::className(), ['roleid' => 'id']);
        }
    
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getRoleMenus() {
            return $this->hasMany(RoleMenu::className(), ['roleid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return RoleQuery the active query used by this AR class.
         */
        public static function find() {
            return new RoleQuery(get_called_class());
        }
    
        /**
         * @inheritdoc
         */
        public static function findOne($id) {
            return parent::find()->andWhere(Role::tableName().".[[id]] = ".\Yii::$app->db->quoteValue($id))->one();
        }
    }
