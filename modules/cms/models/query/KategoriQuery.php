<?php
    
    namespace app\modules\cms\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\cms\models\Kategori]].
     *
     * @see \app\modules\cms\models\Kategori
     */
    class KategoriQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\cms\models\Kategori[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\cms\models\Kategori|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
