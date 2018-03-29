<?php
    
    namespace app\modules\master\models\query;
    
    use app\modules\master\models\HariLibur;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\HariLibur]].
     *
     * @see \app\modules\master\models\HariLibur
     */
    class HariLiburQuery extends ActiveQuery {
        /**
         * Ambil hari libur internal
         *
         * @return $this
         */
        public function internal() {
            return $this->andWhere(HariLibur::tableName().'.[[isinternal]]=1');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\HariLibur[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\HariLibur|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
