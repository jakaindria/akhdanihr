<?php
    
    namespace app\modules\cms\models\query;
    
    use yii\db\ActiveQuery;
    
    /**
     * This is the ActiveQuery class for [[\app\modules\cms\models\Berita]].
     *
     * @see \app\modules\cms\models\Berita
     */
    class BeritaQuery extends ActiveQuery {
        /**
         * Ambil berita yang dipublish
         *
         * @return $this
         */
        public function published() {
            return $this->andWhere('[[ispublished]]=1');
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\cms\models\Berita[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\cms\models\Berita|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
