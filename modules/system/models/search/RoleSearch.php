<?php
    
    namespace app\modules\system\models\search;
    
    use app\modules\system\models\Role;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * RoleSearch represents the model behind the search form of `app\modules\system\models\Role`.
     */
    class RoleSearch extends Role {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'nama'], 'safe'],
                [['islinktounitkerja', 'isbuiltin'], 'integer'],
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
            $query = Role::find();
            
            // add conditions that should always apply here
            
            $dataProvider = new ActiveDataProvider([
                                                       'query' => $query,
                                                   ]);
            
            $this->load($params);
            
            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                 $query->where('0=1');
                return $dataProvider;
            }
            
            // grid filtering conditions
            $query->andFilterWhere([
                                       'islinktounitkerja' => $this->islinktounitkerja,
                                       'isbuiltin'         => $this->isbuiltin,
                                   ]);
            
            $query->andFilterWhere(['like', Role::tableName().'[id]', $this->id])
                ->andFilterWhere(['like', Role::tableName().'[nama]', $this->nama]);
            
            return $dataProvider;
        }
    }
