<?php
    
    namespace app\modules\humancapital\models;
    
    use app\modules\humancapital\models\query\PegawaiGradeQuery;
    use app\modules\master\models\Grade;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "hcm_pegawai_grade".
     *
     * @property int     $id        Primary key dari table
     * @property int     $pegawaiid ID pegawai
     * @property int     $gradeid   ID grade
     * @property string  $tglmulai  Tanggal mulai
     * @property string  $tglakhir  Tanggal akhir
     *
     * @property Grade   $grade
     * @property Pegawai $pegawai
     */
    class PegawaiGrade extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'hcm_pegawai_grade';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['pegawaiid', 'gradeid', 'tglmulai'], 'required'],
                [['pegawaiid', 'gradeid'], 'integer'],
                [['tglmulai', 'tglakhir'], 'safe'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'        => Yii::t('hcm_pegawai_grade', 'ID'),
                'pegawaiid' => Yii::t('hcm_pegawai_grade', 'ID Pegawai'),
                'gradeid'   => Yii::t('hcm_pegawai_grade', 'ID Grade'),
                'tglmulai'  => Yii::t('hcm_pegawai_grade', 'Tanggal Mulai'),
                'tglakhir'  => Yii::t('hcm_pegawai_grade', 'Tanggal Akhir'),
            ];
        }
    
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getGrade() {
            return $this->hasOne(Grade::className(), ['id' => 'gradeid']);
        }
    
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawai() {
            return $this->hasOne(Pegawai::className(), ['id' => 'pegawaiid']);
        }
    
    
        /**
         * @inheritdoc
         * @return PegawaiGradeQuery the active query used by this AR class.
         */
        public static function find() {
            return new PegawaiGradeQuery(get_called_class());
        }
    }
