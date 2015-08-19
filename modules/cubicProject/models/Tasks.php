<?php

namespace app\modules\cubicProject\models;

use Yii;

/**
 * This is the model class for table "{{%cprj_tasks}}".
 *
 * @property integer $id
 * @property integer $projectID
 * @property string $name
 * @property integer $status
 * @property integer $priority
 * @property string $description
 * @property integer $parentTask
 * @property integer $waitListID
 * @property integer $progress
 * @property string $created
 * @property string $startDate
 * @property string $finishDate
 * @property integer $authorID
 * @property integer $responsibleID
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cprj_tasks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectID', 'name', 'status', 'priority', 'description', 'parentTask', 'waitListID', 'progress', 'created', 'startDate', 'finishDate', 'authorID', 'responsibleID'], 'required'],
            [['projectID', 'status', 'priority', 'parentTask', 'waitListID', 'progress', 'authorID', 'responsibleID'], 'integer'],
            [['description'], 'string'],
            [['created', 'startDate', 'finishDate'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'projectID' => 'Project ID',
            'name' => 'Name',
            'status' => 'Status',
            'priority' => 'Priority',
            'description' => 'Description',
            'parentTask' => 'Parent Task',
            'waitListID' => 'Wait List ID',
            'progress' => 'Progress',
            'created' => 'Created',
            'startDate' => 'Start Date',
            'finishDate' => 'Finish Date',
            'authorID' => 'Author ID',
            'responsibleID' => 'Responsible ID',
        ];
    }

    /**
     * @inheritdoc
     * @return TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }
}
