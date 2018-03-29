<?php
    
    namespace app\modules\master\models\query;
    
    use app\modules\master\models\Kota;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Kota]].
     *
     * @see \app\modules\master\models\Kota
     */
    class KotaQuery extends ActiveQuery {
        /**
         * Ambil jabatan yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Kota::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Kota[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Kota|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
