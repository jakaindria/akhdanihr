<?php
    
    namespace app\modules\org\models\query;
    
    use app\modules\org\models\Pemilik;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\org\models\Pemilik]].
     *
     * @see \app\modules\org\models\Pemilik
     */
    class PemilikQuery extends ActiveQuery {
        /** Ambil pemilik yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Pemilik::tableName() . '.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pemilik[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pemilik|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
