<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\JenisIzinCuti;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * JenisIzinCutiSearch represents the model behind the search form of `app\modules\master\models\JenisIzinCuti`.
     */
    class JenisIzinCutiSearch extends JenisIzinCuti {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'tipe', 'hitungberdasarkan', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = JenisIzinCuti::find()->notDeleted();
            
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
            
            $query->andFilterWhere(['like', JenisIzinCuti::tableName().'[[nama]]', $this->nama])
                ->andFilterWhere(['like', JenisIzinCuti::tableName().'[[tipe]]', $this->tipe])
                ->andFilterWhere(['like', JenisIzinCuti::tableName().'[[hitungberdasarkan]]', $this->hitungberdasarkan]);
            
            return $dataProvider;
        }
    }
