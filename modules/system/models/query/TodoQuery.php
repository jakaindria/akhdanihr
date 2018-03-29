<?php
    
    namespace app\modules\system\models\query;
    
    use app\modules\system\models\Todo;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\Todo]].
     *
     * @see \app\modules\system\models\Todo
     */
    class TodoQuery extends ActiveQuery {
        /**
         * Ambil todo yang belum terselesaikan untuk pegawai tertentu
         *
         * @param int $targetid ID pegawai tujuan
         *
         * @return $this
         */
        public function incomplete($targetid) {
            return $this->andWhere("[[targetid]]=".\Yii::$app->db->quoteValue($targetid))->andWhere("[[status]]='".Todo::STATUS_NEW."'");
        }
    
        /**
         * Ambil todo yang sudah terselesaikan untuk pegawai tertentu
         *
         * @param int $targetid ID pegawai tujuan
         *
         * @return $this
         */
        public function complete($targetid) {
            return $this->andWhere("[[targetid]]=".\Yii::$app->db->quoteValue($targetid))->andWhere("[[status]]='".Todo::STATUS_COMPLETED."'");
        }
    
        /**
         * Ambil todo yang dihapus untuk pegawai tertentu
         *
         * @param int $targetid ID pegawai tujuan
         *
         * @return $this
         */
        public function deleted($targetid) {
            return $this->andWhere("[[targetid]]=".\Yii::$app->db->quoteValue($targetid))->andWhere("[[status]]='".Todo::STATUS_DELETED."'");
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Todo[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Todo|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
