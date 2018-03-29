<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\Jabatan;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * JabatanSearch represents the model behind the search form of `app\modules\master\models\Jabatan`.
     */
    class JabatanSearch extends Jabatan {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'parentid', 'isactive', 'isapprover', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['kode', 'treecode', 'nama', 'approvalto', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = Jabatan::find()->notDeleted();
            
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
                                       'parentid'     => $this->parentid,
                                       'isactive'     => $this->isactive,
                                       'isapprover'   => $this->isapprover,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Jabatan::tableName().'.[[kode]]', $this->kode])
                ->andFilterWhere(['like', Jabatan::tableName().'.[[treecode]]', $this->treecode])
                ->andFilterWhere(['like', Jabatan::tableName().'.[[nama]]', $this->nama])
                ->andFilterWhere(['like', Jabatan::tableName().'.[[approvalto]]', $this->approvalto]);
            
            return $dataProvider;
        }
    }
