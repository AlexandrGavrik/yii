<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{   

    public function rules()
    {
        return [
            [['name', 'description', 'status_id', 'user_id'], 'required'],
            [['createDate', 'changeDate', 'endDate'], 'safe'],
            [['status_id', 'user_id'], 'integer'],
        ];
    }
    public static function tableName()
    {
        return 'Task';
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
    public function getStatusName()
    {
        return (isset($this->status))?$this->status->name:'Статус не найден!';
    }
	public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getUserName()
    {
        return (isset($this->user))?$this->user->username:'Пользователь не найден!';
    }
    
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'createDate' => 'Создана',
            'changeDate' => 'Редактирована',
            'endDate' => 'Срок выполнения',
            'status_id' => 'Статус',
			'user_id' => 'Автор',
        ];
    }
   
}