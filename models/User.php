<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class User extends ActiveRecord 
{
	
	
	
	
	
	
	
	public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 50],
            [['password', 'password_hash'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
        ];
    }
	public function getTask()
    {
        // a customer has many comments
        return $this->hasMany(Task::className(), ['user_id' => 'id']);
    }
    public static function getUserList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()->all(),id,username);
    }
}