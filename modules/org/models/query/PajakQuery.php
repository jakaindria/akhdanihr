<?php
    
    namespace app\modules\org\models\query;
    
    use app\modules\org\models\Pajak;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\org\models\Pajak]].
     *
     * @see \app\modules\org\models\Pajak
     */
    class PajakQuery extends ActiveQuery {
        /**
         * Ambil pajak yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Pajak::tableName() . '.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pajak[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Pajak|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
