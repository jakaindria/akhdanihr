<?php
    
    namespace app\helper;
    
    use Faker\Factory;
    use yii\db\ActiveRecord;
    use yii\helpers\BaseFileHelper;
    use yii\web\UploadedFile;
    
    /**
     * Helper terkait file management
     *
     * @package app\helper
     */
    class Dokumen {
        /**
         * @var string Id dokumen. Jika dokumen diupload ke alfresco, maka dokumen id sesuai dengan yang diberikan oleh alfresco. Jika diupload lokal, dokumen id berisi uuid
         */
        public $id;
        /**
         * @var string Nama asli dari dokumen yang diupload
         */
        public $name;
    
        /**
         * @var string Ekstensi file yang diupload
         */
        public $extension;
        /**
         * @var string Url untuk mengakses file dari client
         */
        public $url;
        
        /**
         * @var string Temporary / dummy folder untuk testing upload ke alfresco
         */
        private $alfrescoTempFolder = 'upload/alfresco-temp';
        
        /**
         * @var UploadedFile Object file yang akan diupload
         * @see UploadedFile
         */
        private $file;
        
        /**
         * Buat objek Dokumen dengan parameter model dan nama attribut dari model tsb yang berisi dokumen
         *
         * @param ActiveRecord $model         Model yang digunakan
         * @param string       $attributeName Atribut di dalam model yang berisi file
         */
        public function loadFromModel($model, $attributeName) {
            $this->file = UploadedFile::getInstance($model, $attributeName);
            $this->name = $this->file->name;
            $this->extension = $this->file->extension;
        }
        
        /**
         * Buat object Dokumen dari HTTP File upload variable
         *
         * @param string $parameterName Key dari parameter yang akan diload
         */
        public function loadFromHttpFileUpload($parameterName) {
            $this->file = UploadedFile::getInstanceByName($parameterName);
            $this->name = $this->file->name;
            $this->extension = $this->file->extension;
        }
        
        /**
         * Upload file dari atribut model tertentu ke directory static server
         *
         * @see BaseFileHelper::createDirectory()
         *
         * @param string $filename File yang diupload akan direname dengan nama file ini
         * @param string $dir      Direktori tujuan upload
         *
         * @return string Direktori file terupload
         * @throws \Exception
         */
        public function uploadToLocalServer($filename, $dir) {
            self::checkFileExist();
            
            // cek direktori apakah sudah ada, jika belum ada maka dibuat terlebih dahulu
            if (!file_exists($dir)) {
                try {
                    BaseFileHelper::createDirectory($dir);
                } catch (\Exception $e) {
                    \Yii::error($e->getMessage());
                    throw $e;
                }
            }
            
            // upload file
            $uploadedDir = $dir . '/' . $filename;
            if (!$this->file->saveAs($uploadedDir)) {
                \Yii::error(\Yii::t('akhdanihr', 'Upload file gagal!'));
                throw new \Exception(\Yii::t('akhdanihr', 'Upload file gagal!'));
            }
            
            return $uploadedDir;
        }
    
        /**
         * Upload file dari atribut model tertentu ke alfresco document management
         *
         * @param string|null $docid ID dokumen yang akan direplace jika sudah ada
         *
         * @return bool Status true jika dokumen berhasil diupload
         * @throws \Exception Jika upload file gagal
         */
        public function uploadToAlfresco() {
            // todo : pakai library buat upload ke alfresco
            self::checkFileExist();
            
            // upload file
            $faker = Factory::create();
            $docid = $faker->uuid;
            $this->url = $this->alfrescoTempFolder . '/' . $this->file->name;
            $this->id = $docid;
            
            // cek direktori apakah sudah ada, jika belum ada maka dibuat terlebih dahulu!
            if (!file_exists($this->alfrescoTempFolder)) {
                try {
                    BaseFileHelper::createDirectory($this->alfrescoTempFolder);
                } catch (\Exception $e) {
                    \Yii::error($e->getMessage());
                    throw $e;
                }
            }
            
            if (!$this->file->saveAs($this->url)) {
                \Yii::error(\Yii::t('akhdanihr', 'Upload file gagal!'));
                throw new \Exception(\Yii::t('akhdanihr', 'Upload file gagal!'));
            } else {
                return TRUE;
            }
        }
        
        /**
         * Cek apakah file berhasil dibaca & tidak terdapat error pada file
         *
         * @throws \Exception Jika file belum diset atau terdapat error pada file tsb
         */
        private function checkFileExist() {
            if (!isset($this->file) && $this->file->hasError) {
                \Yii::error("Terdapat kesalahan pada file " . $this->file->name);
                throw new \Exception("Terdapat kesalahan pada file " . $this->file->name);
            }
        }
    }