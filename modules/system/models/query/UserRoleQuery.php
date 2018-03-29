<?php
    
    namespace app\modules\system\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\UserRole]].
     *
     * @see \app\modules\system\models\UserRole
     */
    class UserRoleQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\system\models\UserRole[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\UserRole|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
