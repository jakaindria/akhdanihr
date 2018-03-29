<?php
    
    namespace app\modules\org\models\query;
    use app\modules\org\models\Peralatan;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\org\models\Peralatan]].
     *
     * @see \app\modules\org\models\Peralatan
     */
    class PeralatanQuery extends ActiveQuery {
        /** Ambil pemilik yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Peralatan::tableName() . '.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Peralatan[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\Peralatan|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
