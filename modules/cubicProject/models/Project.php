<?php

namespace app\modules\cubicProject\models;

use Yii;

/**
 * This is the model class for table "{{%cprj_projects}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $created
 * @property integer $responsible_user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cprj_projects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status', 'created', 'responsible_user'], 'required'],
            [['status', 'responsible_user'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255]
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
            'status' => 'Status',
            'created' => 'Created',
            'responsible_user' => 'Responsible User',
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
