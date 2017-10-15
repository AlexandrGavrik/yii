<?php

namespace app\admin\models;

use Yii;

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
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status_id'], 'required'],
            [['createDate', 'changeDate', 'endDate'], 'safe'],
            [['status_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 4000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'createDate' => 'Create Date',
            'changeDate' => 'Change Date',
            'endDate' => 'End Date',
            'status_id' => 'Status ID',
        ];
    }
}
