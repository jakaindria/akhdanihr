<?php
    
    namespace app\modules\master\models\query;
    use app\modules\master\models\JenisIzinCuti;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\JenisIzinCuti]].
     *
     * @see \app\modules\master\models\JenisIzinCuti
     */
    class JenisIzinCutiQuery extends ActiveQuery {
        /**
         * Ambil jenis izin cuti yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(JenisIzinCuti::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\JenisIzinCuti[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\JenisIzinCuti|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
