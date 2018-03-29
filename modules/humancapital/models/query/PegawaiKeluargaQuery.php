<?php
    
    namespace app\modules\humancapital\models\query;
    
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\humancapital\models\PegawaiKeluarga]].
     *
     * @see \app\modules\humancapital\models\PegawaiKeluarga
     */
    class PegawaiKeluargaQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiKeluarga[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiKeluarga|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
