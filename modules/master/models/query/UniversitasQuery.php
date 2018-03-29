<?php
    
    namespace app\modules\master\models\query;
    use app\modules\master\models\Universitas;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Universitas]].
     *
     * @see \app\modules\master\models\Universitas
     */
    class UniversitasQuery extends ActiveQuery {
        /**
         * Ambil provinsi yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Universitas::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Universitas[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Universitas|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
