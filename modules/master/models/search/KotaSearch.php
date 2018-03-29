<?php
    
    namespace app\modules\master\models\search;
    
    use app\modules\master\models\Kota;
    use app\modules\master\models\Provinsi;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use yii\data\Sort;

    /**
     * KotaSearch represents the model behind the search form of `app\modules\master\models\Kota`.
     */
    class KotaSearch extends Kota {
        /**
         * @var Provinsi Objek provinsi untuk keperluan searching dan sorting
         */
        public $provinsi;
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['id', 'provinceid', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['kode', 'nama', 'createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['provinsi'], 'safe']
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
            $query = Kota::find()->notDeleted();
            $query->joinWith(["provinsi"]);
            
            // add conditions that should always apply here
            
            $dataProvider = new ActiveDataProvider([
                                                       'query' => $query,
                                                       'key'   => 'id'
                                                   ]);
    
            $dataProvider->setSort(new Sort([
                                                'attributes'   => [
                                                    'kode'     => [
                                                        'asc'     => ['kode' => SORT_ASC],
                                                        'desc'    => ['kode' => SORT_DESC],
                                                        'default' => SORT_ASC
                                                    ],
                                                    'nama'     => [
                                                        'asc'     => ['nama' => SORT_ASC],
                                                        'desc'    => ['nama' => SORT_DESC],
                                                        'default' => SORT_ASC
                                                    ],
                                                    'provinsi' => [
                                                        'asc'     => [Provinsi::tableName() . '.nama' => SORT_ASC],
                                                        'desc'    => [Provinsi::tableName() . '.nama' => SORT_DESC],
                                                        'default' => SORT_ASC
                                                    ]
                                                ],
                                                'defaultOrder' => [
                                                    'kode' => SORT_ASC
                                                ]
                                            ]));
            
            $this->load($params);
            
            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                $query->where('0=1');
                
                return $dataProvider;
            }
            
            // grid filtering conditions
            $query->andFilterWhere([
                                       'id'           => $this->id,
                                       'provinceid'   => $this->provinceid,
                                       'createuser'   => $this->createuser,
                                       'createtime'   => $this->createtime,
                                       'modifieduser' => $this->modifieduser,
                                       'modifiedtime' => $this->modifiedtime,
                                       'isdeleted'    => $this->isdeleted,
                                       'deleteduser'  => $this->deleteduser,
                                       'deletedtime'  => $this->deletedtime,
                                   ]);
            
            $query->andFilterWhere(['like', Kota::tableName().'.[[kode]]', $this->kode])
                ->andFilterWhere(['like', Provinsi::tableName() . '.[[nama]]', $this->provinsi])
                ->andFilterWhere(['like', Kota::tableName().'.[[nama]]', $this->nama]);
            
            return $dataProvider;
        }
    }
