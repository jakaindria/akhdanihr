<?php
    
    namespace app\modules\org\models\query;
    
    use app\modules\org\models\Pengurus;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\org\models\Pengurus]].
     *
     * @see \app\modules\org\models\Pengurus
     */
    class PengurusQuery extends ActiveQuery {
        /** Ambil pemilik yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Pengurus::tableName() . '.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pengurus[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pengurus|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
