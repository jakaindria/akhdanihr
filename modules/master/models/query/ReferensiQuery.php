<?php
    
    namespace app\modules\master\models\query;
    use app\modules\master\models\Referensi;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Referensi]].
     *
     * @see \app\modules\master\models\Referensi
     */
    class ReferensiQuery extends ActiveQuery {
        /**
         * Ambil data aktif
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere(Referensi::tableName().'.[[isactive]]=1');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Referensi[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Referensi|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
