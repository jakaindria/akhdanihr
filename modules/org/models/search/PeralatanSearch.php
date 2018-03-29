<?php
    
    namespace app\modules\org\models\search;
    
    use app\modules\org\models\Peralatan;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * PeralatanSearch represents the model behind the search form of `app\modules\org\models\Peralatan`.
     */
    class PeralatanSearch extends Peralatan {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'jumlah', 'tahun', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'kapasitas', 'merktipe', 'kondisi', 'lokasi', 'statuskepemilikan', 'bukti', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = Peralatan::find()->notDeleted();
            
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
                                       'jumlah'       => $this->jumlah,
                                       'tahun'        => $this->tahun,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Peralatan::tableName().'.[[nama]]', $this->nama])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[kapasitas]]', $this->kapasitas])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[merktipe]]', $this->merktipe])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[kondisi]]', $this->kondisi])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[lokasi]]', $this->lokasi])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[statuskepemilikan]]', $this->statuskepemilikan])
                ->andFilterWhere(['like', Peralatan::tableName().'.[[bukti]]', $this->bukti]);
            
            return $dataProvider;
        }
    }
