<?php
    
    namespace app\modules\humancapital\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\humancapital\models\PegawaiPendidikan]].
     *
     * @see \app\modules\humancapital\models\PegawaiPendidikan
     */
    class PegawaiPendidikanQuery extends ActiveQuery {
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiPendidikan[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiPendidikan|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
