<?php
    
    namespace app\modules\cms\models;
    
    use app\modules\cms\models\query\KategoriQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "cms_kategori".
     *
     * @property int      $id           Primary key dari tabel
     * @property string   $nama         Nama kategori
     * @property string   $keterangan   Keterangan / deskripsi kategori
     * @property int      $createuser   ID user yang membuat data
     * @property string   $createtime   Waktu data dibuat
     * @property int      $modifieduser ID user yang terakhir melakukan perubahan data
     * @property string   $modifiedtime Waktu terakhir data diubah
     * @property int      $isdeleted    Status data dihapus
     * @property int      $deleteduser  ID user yang menghapus data
     * @property string   $deletedtime  Waktu penghapusan data
     *
     * @property Berita[] $beritas
     */
    class Kategori extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'cms_kategori';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['nama'], 'required'],
                [['createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['nama', 'keterangan'], 'string', 'max' => 255],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('cms_kategori', 'ID'),
                'nama'         => Yii::t('cms_kategori', 'Nama'),
                'keterangan'   => Yii::t('cms_kategori', 'Keterangan'),
                'createuser'   => Yii::t('cms_kategori', 'Createuser'),
                'createtime'   => Yii::t('cms_kategori', 'Createtime'),
                'modifieduser' => Yii::t('cms_kategori', 'Modifieduser'),
                'modifiedtime' => Yii::t('cms_kategori', 'Modifiedtime'),
                'isdeleted'    => Yii::t('cms_kategori', 'Isdeleted'),
                'deleteduser'  => Yii::t('cms_kategori', 'Deleteduser'),
                'deletedtime'  => Yii::t('cms_kategori', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getBeritas() {
            return $this->hasMany(Berita::className(), ['kategoriid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return KategoriQuery the active query used by this AR class.
         */
        public static function find() {
            return new KategoriQuery(get_called_class());
        }
    }
