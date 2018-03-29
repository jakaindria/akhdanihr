<?php
    
    namespace app\modules\system\models;
    
    use app\modules\humancapital\models\Pegawai;
    use app\modules\system\models\query\UserQuery;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\web\Cookie;
    use yii\web\IdentityInterface;
    
    /**
     * This is the model class for table "sys_user".
     *
     * @property int        $id           Primary key dari table
     * @property string     $username     Username
     * @property string     $password     Password
     * @property string     $auth_key     Key otentifikasi dari yii framework
     * @property string     $access_token Token akses dari yii framework
     * @property int        $isactive     Status aktif
     * @property int        $islocked     Status user diblokir / tidak
     * @property string     $lastlogin    Waktu login terakhir
     *
     * @property Pegawai    $pegawai
     * @property Userrole[] $userroles
     */
    class User extends ActiveRecord implements IdentityInterface {
        /**
         * @inheritdoc
         */
        public static function tableName() {
            return 'sys_user';
        }
        
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['username', 'password'], 'required'],
                [['isactive', 'islocked'], 'integer'],
                [['lastlogin'], 'safe'],
                [['username'], 'string', 'max' => 100],
                [['password'], 'string', 'max' => 60],
                [['auth_key', 'access_token'], 'string', 'max' => 32],
                [['username'], 'unique'],
                [['access_token'], 'unique'],
            ];
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels() {
            return [
                'id'           => Yii::t('system_user', 'ID'),
                'username'     => Yii::t('system_user', 'Username'),
                'password'     => Yii::t('system_user', 'Password'),
                'auth_key'     => Yii::t('system_user', 'Auth Key'),
                'access_token' => Yii::t('system_user', 'Access Token'),
                'isactive'     => Yii::t('system_user', 'Status Aktif'),
                'islocked'     => Yii::t('system_user', 'Status Blokir'),
                'lastlogin'    => Yii::t('system_user', 'Login Terakhir'),
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPegawai() {
            return $this->hasOne(Pegawai::className(), ['userid' => 'id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getUserroles() {
            return $this->hasMany(Userrole::className(), ['userid' => 'id']);
        }
        
        /**
         * @inheritdoc
         * @return UserQuery the active query used by this AR class.
         */
        public static function find() {
            return new UserQuery(get_called_class());
        }
        
        /**
         * Finds an identity by the given ID.
         *
         * @param string|int $id the ID to be looked for
         *
         * @return IdentityInterface the identity object that matches the given ID.
         * Null should be returned if such an identity cannot be found
         * or the identity is not in an active state (disabled, deleted, etc.)
         */
        public static function findIdentity($id) {
            return self::find()->active()->notlocked()->andWhere("[[id]]=$id")->one();
        }
        
        /**
         * Finds an identity by the given token.
         *
         * @param mixed $token the token to be looked for
         * @param mixed $type  the type of the token. The value of this parameter depends on the implementation.
         *                     For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be
         *                     `yii\filters\auth\HttpBearerAuth`.
         *
         * @return IdentityInterface the identity object that matches the given token.
         * Null should be returned if such an identity cannot be found
         * or the identity is not in an active state (disabled, deleted, etc.)
         */
        public static function findIdentityByAccessToken($token, $type = NULL) {
            return self::find()->active()->notlocked()->andWhere("[[access_token]]=$token")->one();
        }
        
        /**
         * Returns an ID that can uniquely identify a user identity.
         * @return string|int an ID that uniquely identifies a user identity.
         */
        public function getId() {
            return $this->id;
        }
        
        /**
         * Returns a key that can be used to check the validity of a given identity ID.
         *
         * The key should be unique for each individual user, and should be persistent
         * so that it can be used to check the validity of the user identity.
         *
         * The space of such keys should be big enough to defeat potential identity attacks.
         *
         * This is required if [[User::enableAutoLogin]] is enabled.
         * @return string a key that is used to check the validity of a given identity ID.
         * @see validateAuthKey()
         */
        public function getAuthKey() {
            return $this->auth_key;
        }
        
        /**
         * Validates the given auth key.
         *
         * This is required if [[User::enableAutoLogin]] is enabled.
         *
         * @param string $authKey the given auth key
         *
         * @return bool whether the given auth key is valid.
         * @see getAuthKey()
         */
        public function validateAuthKey($authKey) {
            return $this->auth_key === $authKey;
        }
        
        /**
         * Generate nilai field auth_key dan access_token, serta hash field password sebelum data user baru disimpan
         *
         * @inheritdoc
         */
        public function beforeSave($insert) {
            if (parent::beforeSave($insert)) {
                if ($this->isNewRecord) {
                    $this->auth_key = \Yii::$app->security->generateRandomString();
                    $this->access_token = \Yii::$app->security->generateRandomString();
                    $this->password = \Yii::$app->security->generatePasswordHash($this->password);
                }
                
                return TRUE;
            }
            
            return FALSE;
        }
        
        /**
         * Login ke aplikasi dengan melakukan pengecekan terhadap username dan password yang diinput, jika cocok
         * kemudian data user disimpan ke session
         *
         * @param string $csrf_token CSRF token dari http request
         *
         * @return bool Username dan password ditemukan di database
         */
        public function login($csrf_token) {
            // ambil data user berdasarkan username
            $user = self::findOne(['username' => $this->username]);
            
            // jika user tidak ditemukan, return false
            if (is_null($user)) return FALSE;
            
            // lakukan pengecekan terhadap password yang diinput dengan password di database
            $password_match = \Yii::$app->security->validatePassword($this->password, $user->password);
            
            // Jika password cocok, lakukan penyimpanan data user ke session. Jika tidak, return false
            if ($password_match) {
                // set last login field
                $user->lastlogin = date("Y-m-d H:i:s");
                
                // login ke identity framework untuk AccessControl Filter di controller
                \Yii::$app->user->login($user);
                
                // inisiasi session
                $session = \Yii::$app->session;
                $session->open();
                
                // set atibut session berdasarkan atribut dari model sys\User kecuali password
                foreach ($user->attributes as $key => $val) {
                    if ($key != "password") $session->set($key, $val);
                }
                
                // isi atribut name di session dengan field nama dari data pegawai jika ada atau username jika tidak ditemukan
                $pegawai = new Pegawai();
                $pegawai->setAttributes($user->getPegawai()->one() ? $user->getPegawai()->one()->getAttributes() : $pegawai->getAttributes());
                $session->set("employee", $pegawai->getAttributes());
                
                // update tabel user
                $user->save();
                
                $cookies = \Yii::$app->response->cookies;
                $cookies->add(new Cookie([
                                             'name'  => '_csrf',
                                             'value' => $csrf_token,
                                         ]));
                
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        /**
         * Logout dari aplikasi
         *
         * @return bool TRUE jika berhasil logout atau FALSE jika gagal
         */
        public static function logout() {
            try {
                // logout dari identity framework
                \Yii::$app->user->logout();
                
                // tutup session
                \Yii::$app->session->close();
                \Yii::$app->session->destroy();
                
                return TRUE;
            } catch (\Exception $ignored) {
                return FALSE;
            }
        }
    }
