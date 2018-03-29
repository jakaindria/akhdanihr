<?php
    
    namespace app\modules\master\models\query;
    use app\modules\master\models\Jabatan;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Jabatan]].
     *
     * @see \app\modules\master\models\Jabatan
     */
    class JabatanQuery extends ActiveQuery {
        /**
         * Ambil jabatan yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Jabatan::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * Ambil jabatan aktif
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere(Jabatan::tableName().'.[[isactive]]=1')->andWhere(Jabatan::tableName().'.[[isdeleted]]=0');
        }
    
        /**
         * Ambil jabatan yang merupakan approver
         *
         * @return $this
         */
        public function approver() {
            return $this->andWhere(Jabatan::tableName().'.[[isapprover]]=1');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Jabatan[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Jabatan|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
