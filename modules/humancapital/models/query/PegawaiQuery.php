<?php
    
    namespace app\modules\humancapital\models\query;
    
    use app\modules\humancapital\models\Pegawai;
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\humancapital\models\Pegawai]].
     *
     * @see \app\modules\humancapital\models\Pegawai
     */
    class PegawaiQuery extends ActiveQuery {
        /**
         * Ambil pegawai aktif
         * @return $this
         */
        public function active() {
            $jenisPegawaiAktif = [
                Pegawai::JENIS_PEGAWAI_TETAP,
                Pegawai::JENIS_PEGAWAI_KONTRAK,
                Pegawai::JENIS_PEGAWAI_PDMP,
                Pegawai::JENIS_PEGAWAI_SPECIAL_HIRE,
                Pegawai::JENIS_PEGAWAI_TENAGA_AHLI,
                Pegawai::JENIS_PEGAWAI_OUTSOURCE,
                Pegawai::JENIS_PEGAWAI_DIREKSI,
                Pegawai::JENIS_PEGAWAI_MAGANG,
            ];
            return $this->andWhere('[[isactive]]=1')
                ->andWhere('[[isdeleted]]=0')
                ->andWhere("[[jenis]] IN ('".implode("','",$jenisPegawaiAktif)."')");
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\Pegawai[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\humancapital\models\Pegawai|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
