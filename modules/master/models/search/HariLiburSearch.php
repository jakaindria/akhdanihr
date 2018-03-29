<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\HariLibur;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * HariLiburSearch represents the model behind the search form of `app\modules\master\models\HariLibur`.
     */
    class HariLiburSearch extends HariLibur {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'isinternal'], 'integer'],
                [['tanggal', 'keterangan'], 'safe'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function scenarios() {
            // bypass scenarios() implementation in the parent class
            return Model::scenarios();
        }
        
        /**
         * Creates data provider instance with search query applied
         *
         * @param array $params
         *
         * @return ActiveDataProvider
         */
        public function search($params) {
            $query = HariLibur::find();
            
            // add conditions that should always apply here
            $dataProvider = new ActiveDataProvider([
                                                       'query' => $query,
                                                       'key'   => 'id'
                                                   ]);
            
            $this->load($params);
            
            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                $query->where('0=1');
                
                return $dataProvider;
            }
            
            // grid filtering conditions
            $query->andFilterWhere([
                                       'id'         => $this->id,
                                       'tanggal'    => $this->tanggal,
                                       'isinternal' => $this->isinternal,
                                   ]);
            
            $query->andFilterWhere(['like', HariLibur::tableName().'.[[keterangan]]', $this->keterangan]);
            
            return $dataProvider;
        }
    }
