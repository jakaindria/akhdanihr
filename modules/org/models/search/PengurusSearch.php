<?php
    
    namespace app\modules\org\models\search;
    
    use app\modules\org\models\Pengurus;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * PengurusSearch represents the model behind the search form of `app\modules\org\models\Pengurus`.
     */
    class PengurusSearch extends Pengurus {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'noktp', 'alamat', 'jabatan', 'tglmenjabatdari', 'tglmenjabatsampai', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = Pengurus::find()->notDeleted();
            
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
                                       'id'                => $this->id,
                                       'tglmenjabatdari'   => $this->tglmenjabatdari,
                                       'tglmenjabatsampai' => $this->tglmenjabatsampai,
                                       'createuser'        => $this->createuser,
                                       'createtime'        => $this->createtime,
                                       'modifieduser'      => $this->modifieduser,
                                       'modifiedtime'      => $this->modifiedtime,
                                       'isdeleted'         => $this->isdeleted,
                                       'deleteduser'       => $this->deleteduser,
                                       'deletedtime'       => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Pengurus::tableName() . '.[[nama]]', $this->nama])
                ->andFilterWhere(['like', Pengurus::tableName() . '.[[noktp]]', $this->noktp])
                ->andFilterWhere(['like', Pengurus::tableName() . '.[[alamat]]', $this->alamat])
                ->andFilterWhere(['like', Pengurus::tableName() . '.[[jabatan]]', $this->jabatan]);
            
            return $dataProvider;
        }
    }
