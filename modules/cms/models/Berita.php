<?php
    
    namespace app\modules\cms\models;
    
    use app\modules\cms\models\query\BeritaQuery;
    use Yii;
    use yii\db\ActiveRecord;
    
    /**
     * This is the model class for table "cms_berita".
     *
     * @property int      $id           Primary key dari tabel
     * @property int      $kategoriid   ID kategori berita
     * @property string   $judul        Judul berita
     * @property string   $intro        Preview / intro berita
     * @property string   $konten       Konten lengkap berita
     * @property int      $ispublished  Status dipublish atau tidak
     * @property int      $createuser   ID user yang membuat data
     * @property string   $createtime   Waktu data dibuat
     * @property int      $modifieduser ID user yang terakhir melakukan perubahan data
     * @property string   $modifiedtime Waktu terakhir data diubah
     * @property int      $isdeleted    Status data dihapus
     * @property int      $deleteduser  ID user yang menghapus data
     * @property string   $deletedtime  Waktu penghapusan data
     *
     * @property Kategori $kategori
     */
    class Berita extends ActiveRecord {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'cms_berita';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['kategoriid', 'ispublished', 'createuser', 'modifieduser', 'isdeleted', 'deleteduser'], 'integer'],
                [['intro', 'konten'], 'string'],
                [['createtime', 'modifiedtime', 'deletedtime'], 'safe'],
                [['judul'], 'string', 'max' => 50],
                [['kategoriid'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategoriid' => 'id']],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('cms_berita', 'ID'),
                'kategoriid'   => Yii::t('cms_berita', 'ID Kategori'),
                'judul'        => Yii::t('cms_berita', 'Judul'),
                'intro'        => Yii::t('cms_berita', 'Intro / Preview'),
                'konten'       => Yii::t('cms_berita', 'Konten'),
                'ispublished'  => Yii::t('cms_berita', 'Status Publish'),
                'createuser'   => Yii::t('cms_berita', 'Createuser'),
                'createtime'   => Yii::t('cms_berita', 'Createtime'),
                'modifieduser' => Yii::t('cms_berita', 'Modifieduser'),
                'modifiedtime' => Yii::t('cms_berita', 'Modifiedtime'),
                'isdeleted'    => Yii::t('cms_berita', 'Isdeleted'),
                'deleteduser'  => Yii::t('cms_berita', 'Deleteduser'),
                'deletedtime'  => Yii::t('cms_berita', 'Deletedtime'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getKategori() {
            return $this->hasOne(Kategori::className(), ['id' => 'kategoriid']);
        }
        
        /**
         * @inheritdoc
         * @return BeritaQuery the active query used by this AR class.
         */
        public static function find() {
            return new BeritaQuery(get_called_class());
        }
    }
