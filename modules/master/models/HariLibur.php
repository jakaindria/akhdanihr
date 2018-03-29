<?php
    
    namespace app\modules\master\models;
    
    use app\modules\master\models\query\HariLiburQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * Kelas model untuk data hari libur
     *
     * @property int    $id         Primary key data hari libur
     * @property string $tanggal    Tanggal libur
     * @property string $keterangan Keterangan / nama hari libur
     * @property int    $isinternal Status apakah hari libur merupakan libut internal yang ditentukan perusahaan
     */
    class HariLibur extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'mst_hari_libur';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['tanggal', 'keterangan'], 'required'],
                [['isinternal'], 'integer'],
                [['tanggal'], 'safe'],
                [['keterangan'], 'string', 'max' => 255],
                [['id'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'         => Yii::t('master_harilibur', 'ID'),
                'tanggal'    => Yii::t('master_harilibur', 'Tanggal'),
                'keterangan' => Yii::t('master_harilibur', 'Keterangan'),
                'isinternal' => Yii::t('master_harilibur', 'Libur Internal Perusahaan'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return HariLiburQuery the active query used by this AR class.
         */
        public static function find() {
            return new HariLiburQuery(get_called_class());
        }
    }
