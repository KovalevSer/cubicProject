<?php

namespace app\modules\cubicProject\models;


use Yii;
use app\modules\cubicProject\models\TaskStatus;
use app\modules\cubicProject\models\TaskStatusSearch;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%cprj_taskstatus}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class TaskStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cprj_taskstatus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 120]
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
        ];
    }

    public static function getTaskStatusArr()
    {
$model = new TaskStatus;
        $listData = ArrayHelper::map( $model->find()->all(), 'id', 'name');

        return $listData;
    }
}
