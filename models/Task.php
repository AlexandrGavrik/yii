<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{   
    /**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $createDate
 * @property string $changeDate
 * @property string $endDate
 * @property integer $status_id
 * @property integer $user_id
 */
   /* 
   public $name;
    public $description;
    public $createDate;
    public $changeDate;
    public $endDate;
    public $status_id;
	public $user_id;
*/
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
        return $this->hasOne(\app\admin\models\User::className(), ['id' => 'user_id']);
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