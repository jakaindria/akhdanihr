<?php
    
    namespace app\modules\org\models\query;
    
    use app\modules\org\models\IzinUsaha;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\org\models\IzinUsaha]].
     *
     * @see \app\modules\org\models\IzinUsaha
     */
    class IzinUsahaQuery extends ActiveQuery {
        /**
         * Ambil izin usaha yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(IzinUsaha::tableName() . '.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\IzinUsaha[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\org\models\IzinUsaha|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
