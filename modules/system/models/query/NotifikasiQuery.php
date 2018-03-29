<?php
    
    namespace app\modules\system\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\Notifikasi]].
     *
     * @see \app\modules\system\models\Notifikasi
     */
    class NotifikasiQuery extends ActiveQuery {
        /**
         * Ambil notifikasi yang belum dibaca untuk pegawai tertentu
         *
         * @param int $targetid ID pegawai tujuan
         *
         * @return $this
         */
        public function unread($targetid){
            return $this->andWhere("[[targetid]]=".\Yii::$app->db->quoteValue($targetid))->andWhere("[[isread]]=0");
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Notifikasi[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Notifikasi|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
