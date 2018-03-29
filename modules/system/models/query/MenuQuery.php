<?php
    
    namespace app\modules\system\models\query;
    use app\modules\system\models\Menu;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\Menu]].
     *
     * @see \app\modules\system\models\Menu
     */
    class MenuQuery extends ActiveQuery {
        /**
         * Ambil menu level 1
         *
         * @return $this
        */
        public function parent(){
            return $this->andWhere(Menu::tableName().".[[parentid]] IS NULL");
        }
    
        /**
         * Ambil menu level 2
         *
         * @return $this
         */
        public function notParent(){
            return $this->andWhere("NOT ".Menu::tableName().".[[parentid]] IS NULL");
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Menu[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Menu|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
