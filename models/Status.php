<?php

namespace app\models;

use yii\db\ActiveRecord;
//use yii\helpers\ArrayHelper;

class Status extends ActiveRecord
{
    public static function tableName()
    {
        return 'Status';
    }
    public function getTask()
    {
        // a customer has many comments
        return $this->hasMany(Task::className(), ['status_id' => 'id']);
    }
    public static function getStatusList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(),id,name);
    }
}