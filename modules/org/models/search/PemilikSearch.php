<?php
    
    namespace app\modules\org\models\search;
    
    use app\modules\org\models\Pemilik;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * PemilikSearch represents the model behind the search form of `app\modules\org\models\Pemilik`.
     */
    class PemilikSearch extends Pemilik {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'noktp', 'alamat', 'satuan', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['saham'], 'number'],
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
            $query = Pemilik::find()->notDeleted();
            
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
                                       'id'           => $this->id,
                                       'saham'        => $this->saham,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Pemilik::tableName() . '.[[nama]]', $this->nama])
                ->andFilterWhere(['like', Pemilik::tableName() . '.[[noktp]]', $this->noktp])
                ->andFilterWhere(['like', Pemilik::tableName() . '.[[alamat]]', $this->alamat])
                ->andFilterWhere(['like', Pemilik::tableName() . '.[[satuan]]', $this->satuan]);
            
            return $dataProvider;
        }
    }
