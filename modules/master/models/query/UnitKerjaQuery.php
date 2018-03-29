<?php
    
    namespace app\modules\master\models\query;
    
    use app\modules\master\models\UnitKerja;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\UnitKerja]].
     *
     * @see \app\modules\master\models\UnitKerja
     */
    class UnitKerjaQuery extends ActiveQuery {
        /**
         * Ambil unit kerja yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(UnitKerja::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * Ambil unit kerja aktif
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere(UnitKerja::tableName().'.[[isactive]]=1')->andWhere(UnitKerja::tableName().'.[[isdeleted]]=0');
        }
    
        /**
         * Ambil unit kerja yang mempunyai GL sendiri untuk kebutuhan finance
         *
         * @return $this
         */
        public function havegl() {
            return $this->andWhere(UnitKerja::tableName().'.[[ishavegl]]=1');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\UnitKerja[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\UnitKerja|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
