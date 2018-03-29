<?php
    
    namespace app\modules\humancapital\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\humancapital\models\PegawaiJabatan]].
     *
     * @see \app\modules\humancapital\models\PegawaiJabatan
     */
    class PegawaiJabatanQuery extends ActiveQuery {
        /**
         * Ambil jabatan terakhir pegawai
         *
         * @param int $pegawaiid ID pegawai
         *
         * @return $this
         */
        public function terakhir($pegawaiid) {
            return $this->andWhere('[[pegawaiid]]='.\Yii::$app->db->quoteValue($pegawaiid))
                ->orderBy(['tglmulai'=>SORT_DESC])
                ->limit(1);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiJabatan[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\PegawaiJabatan|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
