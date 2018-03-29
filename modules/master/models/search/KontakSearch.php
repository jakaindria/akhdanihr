<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\Kontak;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    
    /**
     * KontakSearch represents the model behind the search form of `app\modules\master\models\Kontak`.
     */
    class KontakSearch extends Kontak {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'isactive', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['nama', 'alamat', 'telepon', 'fax', 'email', 'npwp', 'jenis', 'asal', 'klasifikasi', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
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
            $query = Kontak::find()->active();
            
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
                                       'isactive'     => $this->isactive,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Kontak::tableName().'.[[nama]]', $this->nama])
                ->andFilterWhere(['like', Kontak::tableName().'.[[alamat]]', $this->alamat])
                ->andFilterWhere(['like', Kontak::tableName().'.[[telepon]]', $this->telepon])
                ->andFilterWhere(['like', Kontak::tableName().'.[[fax]]', $this->fax])
                ->andFilterWhere(['like', Kontak::tableName().'.[[email]]', $this->email])
                ->andFilterWhere(['like', Kontak::tableName().'.[[npwp]]', $this->npwp])
                ->andFilterWhere(['like', Kontak::tableName().'.[[jenis]]', $this->jenis])
                ->andFilterWhere(['like', Kontak::tableName().'.[[asal]]', $this->asal])
                ->andFilterWhere(['like', Kontak::tableName().'.[[klasifikasi]]', $this->klasifikasi]);
            
            return $dataProvider;
        }
    }
