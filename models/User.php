<?php

namespace app\models;

 use yii\helpers\ArrayHelper;
 
 
 class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
	private static $users;
    /* private static $users = [
        '1' => [
            'id' => '1',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test1key',
            'accessToken' => '1-token',
        ],
        '2' => [
            'id' => '2',
            'username' => 'user',
            'password' => 'user',
            'authKey' => 'test2key',
            'accessToken' => '2-token',
        ],
    ]; */
	

    /**
     * @inheritdoc
     */
		private function user(){
			self::$users = ArrayHelper::index(\app\admin\models\User::find()->asArray()->all(), 'id');	
		}
		
	   public static function findIdentity($id)
    {
		if(!self::$users){self::user();};
		//self::$users = ArrayHelper::index(\app\admin\models\User::find()->asArray()->all(), 'id');
		//$users = ArrayHelper::index(\app\admin\models\User::find()->asArray()->all(), 'id');
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }
   /*  public static function findIdentity($id)
    {	$users=ArrayHelper::toArray(\app\admin\models\User::find()->where('id = :id', [':id' => $id])->one());
        return isset($users) ? new static($users) : null;
    } */

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
		if(!self::$users){self::user();};
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
		if(!self::$users){self::user();};
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
	public function getTask()
    {
        // a customer has many comments
        return $this->hasMany(Task::className(), ['user_id' => 'id']);
    }
    public static function getUserList()
    {
        return \yii\helpers\ArrayHelper::map(\app\admin\models\User::find()->all(),id,username);
    }
}