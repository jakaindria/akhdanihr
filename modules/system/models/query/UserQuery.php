<?php
    
    namespace app\modules\system\models\query;
    
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\User]].
     *
     * @see \app\modules\system\models\User
     */
    class UserQuery extends ActiveQuery {
        /**
         * Query aktif user
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere('[[isactive]]=1');
        }
        
        /**
         * Query user yang tidak diblokir
         *
         * @return $this
         */
        public function notlocked() {
            return $this->andWhere('[[islocked]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\User[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\User|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
