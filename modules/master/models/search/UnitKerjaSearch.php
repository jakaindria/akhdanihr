<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\UnitKerja;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * UnitKerjaSearch represents the model behind the search form of `app\modules\master\models\UnitKerja`.
     */
    class UnitKerjaSearch extends UnitKerja {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'parentid', 'ishavegl', 'isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['kode', 'treecode', 'nama', 'alamat', 'telepon', 'fax', 'email', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = UnitKerja::find()->notDeleted();
            
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
                                       'ishavegl'     => $this->ishavegl,
                                       'isactive'     => $this->isactive,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', UnitKerja::tableName() . '.[[kode]]', $this->kode])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[treecode]]', $this->treecode])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[nama]]', $this->nama])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[alamat]]', $this->alamat])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[telepon]]', $this->telepon])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[fax]]', $this->fax])
                ->andFilterWhere(['like', UnitKerja::tableName() . '.[[email]]', $this->email]);
            
            return $dataProvider;
        }
    }
