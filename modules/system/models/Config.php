<?php
    
    namespace app\modules\system\models;
    
    use app\modules\system\models\query\ConfigQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "sys_config".
     *
     * @property string $kode      Kode
     * @property string $deskripsi Deskripsi
     * @property string $nilai     Nilai konfigurasi
     */
    class Config extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_config';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kode', 'nilai'], 'required'],
                [['kode'], 'string', 'max' => 50],
                [['deskripsi', 'nilai'], 'string', 'max' => 255],
                [['kode'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'kode'      => Yii::t('system_config', 'Kode'),
                'deskripsi' => Yii::t('system_config', 'Deskripsi'),
                'nilai'     => Yii::t('system_config', 'Nilai'),
            ];
        }
        
        /**
         * @inheritdoc
         * @return ConfigQuery the active query used by this AR class.
         */
        public static function find() {
            return new ConfigQuery(get_called_class());
        }
    }
