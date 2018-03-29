<?php
    
    namespace app\modules\system\models\query;
    
    use app\modules\system\models\Role;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\Role]].
     *
     * @see \app\modules\system\models\Role
     */
    class RoleQuery extends ActiveQuery {
        /**
         * Role yang terkait ke unit kerja
         *
         * @return $this
         */
        public function linkedToUnitKerja() {
            return $this->andWhere(Role::tableName().'.[[islinktounitkerja]]=1');
        }
    
        /**
         * Role yang tidak terkait ke unit kerja
         *
         * @return $this
         */
        public function notLinkedToUnitKerja() {
            return $this->andWhere(Role::tableName().'.[[islinktounitkerja]]=0');
        }
        
        /**
         * Role built in
         *
         * @return $this
         */
        public function builtIn() {
            return $this->andWhere(Role::tableName().'.[[isbuiltin]]=1');
        }
    
        /**
         * Role yang bukan built in
         *
         * @return $this
         */
        public function notBuiltIn() {
            return $this->andWhere(Role::tableName().'.[[isbuiltin]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Role[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Role|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
