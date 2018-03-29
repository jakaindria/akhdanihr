<?php
    
    namespace app\modules\system\models;
    
    use app\modules\system\models\query\MenuQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "system_menu".
     *
     * @property int         $id               Primary key dari table
     * @property string      $kode             Kode menu
     * @property int         $parentid         ID parent menu
     * @property string      $treecode         Treecode menu
     * @property string      $label            Label menu
     * @property string      $url              URL tujuan menu
     * @property string      $icon             Icon
     * @property int         $ordernumber      Urutan
     * @property Menu[]|null $children         Item menu level 2
     *
     * @property RoleMenu[]  $roleMenus        Daftar role yang memiliki menu
     */
    class Menu extends ActiveRecord {
        public $children;
        
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_menu';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode', 'treecode', 'label'], 'required'],
                [['parentid', 'ordernumber'], 'integer'],
                [['kode'], 'string', 'max' => 4],
                [['treecode', 'label', 'url', 'icon'], 'string', 'max' => 255],
                [['kode'], 'unique'],
                [['treecode'], 'unique'],
            ];
        }
        
        /**
         * Generate kode & treecode
         *
         * @inheritdoc
         */
        public function beforeSave($insert) {
            if (!parent::beforeSave($insert)) {
                Yii::error($this->getErrors());
                
                return FALSE;
            }
            
            foreach ($this->dirtyAttributes as $key => $val) {
                if ($val == "") $this->{$key} = NULL;
            }
            
            if ($insert) {
                // ambil jabatan dengan kode terakhir
                $menu = Menu::find()->orderBy("kode DESC")->one();
                
                if ($menu !== NULL) {
                    // generate kode baru
                    // kode baru = kode terakhir + 1, format leading zero 4 karakter
                    $lastcode = intval($menu->attributes['kode']);
                    $this->kode = str_pad(++$lastcode, 4, '0', STR_PAD_LEFT);
                } else {
                    // jika belum ada data jabatan, set kode sebagai 0001
                    $this->kode = '0001';
                }
                
                // ambil parent jika dipilih
                $parent = isset($this->attributes['parentid']) && $this->attributes['parentid'] !== '' ? Menu::find()->andWhere("id = " . $this->attributes['parentid'])->one() : NULL;
                
                // generate treecode
                // treecode = treecode parent (jika ada) + kode jabatan baru. separator kode menggunakan titik
                $this->treecode = $parent ? $parent->attributes['treecode'] . '.' . $this->kode : $this->kode;
                
                // jika parent tidak dipilih, set parentid = null
                if (!isset($parent) || is_null($parent)) $this->parentid = NULL;
            }
            
            return TRUE;
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'          => Yii::t('system_menu', 'ID'),
                'kode'        => Yii::t('system_menu', 'Kode'),
                'parentid'    => Yii::t('system_menu', 'Parent'),
                'treecode'    => Yii::t('system_menu', 'Treecode'),
                'label'       => Yii::t('system_menu', 'Label'),
                'url'         => Yii::t('system_menu', 'URL'),
                'icon'        => Yii::t('system_menu', 'Icon'),
                'ordernumber' => Yii::t('system_menu', 'Urutan'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getRoleMenus() {
            return $this->hasMany(RoleMenu::className(), ['menuid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return MenuQuery the active query used by this AR class.
         */
        public static function find() {
            return new MenuQuery(get_called_class());
        }
        
        /**
         * Ambil semua menu dengan format yang mendukung JSTree. Contoh :
         * [
         *   { "id" : "ajson1", "parent" : "#", "text" : "Simple root node" },
         *   { "id" : "ajson2", "parent" : "#", "text" : "Root node 2" },
         *   { "id" : "ajson3", "parent" : "ajson2", "text" : "Child 1" },
         *   { "id" : "ajson4", "parent" : "ajson2", "text" : "Child 2" },
         *  ]
         *
         * @return array Semua menu yang tersedia
         */
        public function allJSTreeFormated() {
            $result = [];
            
            $menus = Menu::find()->orderBy('ordernumber')->all();
            foreach ($menus as $menu) {
                $result[] = [
                    "id"     => $menu->id,
                    "parent" => $menu->parentid ?: "#",
                    "text"   => $menu->label
                ];
            }
            
            return $result;
        }
    
        /**
         * @return Menu[] Array menu dalam bentuk tree
         */
        public function allTree() {
            $result = [];
            
            $parents = Menu::find()->parent()->orderBy(['ordernumber' => SORT_ASC])->all();
            $children = Menu::find()->notParent()->orderBy(['ordernumber' => SORT_ASC])->all();
            
            foreach ($parents as $parent) {
                $result[$parent->id] = $parent;
            }
            
            foreach ($children as $child) {
                $result[$child->parentid]->children[] = $child;
            }
            
            return $result;
        }
    }
