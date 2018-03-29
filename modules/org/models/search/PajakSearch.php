<?php
    
    namespace app\modules\org\models\search;
    
    use app\modules\org\models\Pajak;
    use app\modules\org\models\Pajak as PajakModel;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * Pajak represents the model behind the search form of `app\modules\org\models\Pajak`.
     */
    class PajakSearch extends PajakModel {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'masa', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['jenis', 'nomorbukti', 'tglbukti', 'docid', 'docurl', 'docname', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = PajakModel::find()->notDeleted();
            
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
                                       'masa'         => $this->masa,
                                       'tglbukti'     => $this->tglbukti,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Pajak::tableName() . '.[[jenis]]', $this->jenis])
                ->andFilterWhere(['like', Pajak::tableName() . '.[[nomorbukti]]', $this->nomorbukti])
                ->andFilterWhere(['like', Pajak::tableName() . '.[[docid]]', $this->docid])
                ->andFilterWhere(['like', Pajak::tableName() . '.[[docurl]]', $this->docurl])
                ->andFilterWhere(['like', Pajak::tableName() . '.[[docname]]', $this->docname]);
            
            return $dataProvider;
        }
    }
