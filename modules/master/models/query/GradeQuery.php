<?php
    
    namespace app\modules\master\models\query;
    
    use app\modules\master\models\Grade;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Grade]].
     *
     * @see \app\modules\master\models\Grade
     */
    class GradeQuery extends ActiveQuery {
        /**
         * Ambil grade yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Grade::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * Ambil grade aktif
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere(Grade::tableName().'.[[isactive]]=1')->andWhere(Grade::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Grade[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Grade|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
