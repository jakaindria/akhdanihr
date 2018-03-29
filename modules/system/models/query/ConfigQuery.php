<?php
    
    namespace app\modules\system\models\query;
    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[\app\modules\system\models\Config]].
     *
     * @see \app\modules\system\models\Config
     */
    class ConfigQuery extends ActiveQuery {
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Config[]|array
         */
        public function all($db = NULL) {
            return parent::all($db);
        }
        
        /**
         * @inheritdoc
         * @return \app\modules\system\models\Config|array|null
         */
        public function one($db = NULL) {
            return parent::one($db);
        }
    }
