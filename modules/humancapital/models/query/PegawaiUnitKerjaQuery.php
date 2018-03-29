<?php
    
    namespace app\modules\humancapital\models\query;
    
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\humancapital\models\PegawaiUnitKerja]].
     *
     * @see \app\modules\humancapital\models\PegawaiUnitKerja
     */
    class PegawaiUnitKerjaQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiUnitKerja[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiUnitKerja|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
