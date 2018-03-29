<?php
    
    namespace app\modules\master\models\query;
    
    use app\modules\master\models\Kontak;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\master\models\Kontak]].
     *
     * @see \app\modules\master\models\Kontak
     */
    class KontakQuery extends ActiveQuery {
        /**
         * Ambil kontak yang tidak dihapus
         *
         * @return $this
         */
        public function notDeleted() {
            return $this->andWhere(Kontak::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * Ambil kontak aktif
         *
         * @return $this
         */
        public function active() {
            return $this->andWhere(Kontak::tableName().'.[[isactive]]=1')->andWhere(Kontak::tableName().'.[[isdeleted]]=0');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Kontak[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\master\models\Kontak|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
