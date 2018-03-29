<?php
    
    namespace app\modules\system\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\RoleMenu]].
     *
     * @see \app\modules\system\models\RoleMenu
     */
    class RoleMenuQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\system\models\RoleMenu[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\RoleMenu|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
