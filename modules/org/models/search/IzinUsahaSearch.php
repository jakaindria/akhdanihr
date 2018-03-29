<?php
    
    namespace app\modules\org\models\search;
    
    use app\modules\org\models\IzinUsaha;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * IzinUsahaSearch represents the model behind the search form of `app\modules\org\models\IzinUsaha`.
     */
    class IzinUsahaSearch extends IzinUsaha {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['jenis', 'nomor', 'tglberlaku', 'instansi', 'klasifikasi', 'kualifikasi', 'docurl', 'docname', 'docid', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = IzinUsaha::find()->notDeleted();
            
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
                                       'tglberlaku'   => $this->tglberlaku,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', IzinUsaha::tableName() . '.[[jenis]]', $this->jenis])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[nomor]]', $this->nomor])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[instansi]]', $this->instansi])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[klasifikasi]]', $this->klasifikasi])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[kualifikasi]]', $this->kualifikasi])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[docurl]]', $this->docurl])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[docname]]', $this->docname])
                ->andFilterWhere(['like', IzinUsaha::tableName() . '.[[docid]]', $this->docid]);
            
            return $dataProvider;
        }
    }
