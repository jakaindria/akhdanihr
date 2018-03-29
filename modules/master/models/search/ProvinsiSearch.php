<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\Provinsi;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * ProvinsiSearch represents the model behind the search form of `app\modules\master\models\Provinsi`.
     */
    class ProvinsiSearch extends Provinsi {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['kode', 'nama', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = Provinsi::find()->notDeleted();
            
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
                                       'id'           => $this->id,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Provinsi::tableName().'.[[kode]]', $this->kode])
                ->andFilterWhere(['like', Provinsi::tableName().'.[[nama]]', $this->nama]);
            
            return $dataProvider;
        }
    }
