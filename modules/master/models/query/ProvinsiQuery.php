<?php
    
    namespace app\modules\master\models\query;
    use app\modules\master\models\Provinsi;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Provinsi]].
     *
     * @see \app\modules\master\models\Provinsi
     */
    class ProvinsiQuery extends ActiveQuery {
        /**
         * Ambil provinsi yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Provinsi::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Provinsi[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Provinsi|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
