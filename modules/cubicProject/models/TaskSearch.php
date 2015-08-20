<?php

namespace app\modules\cubicProject\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cubicProject\models\Tasks;

/**
 * TasksSearch represents the model behind the search form about `app\modules\cubicProject\models\Tasks`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'projectID', 'status', 'priority', 'parentTask', 'waitListID', 'progress', 'authorID', 'responsibleID'], 'integer'],
            [['name', 'description', 'created', 'startDate', 'finishDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'projectID' => $this->projectID,
            'status' => $this->status,
            'priority' => $this->priority,
            'parentTask' => $this->parentTask,
            'waitListID' => $this->waitListID,
            'progress' => $this->progress,
            'created' => $this->created,
            'startDate' => $this->startDate,
            'finishDate' => $this->finishDate,
            'authorID' => $this->authorID,
            'responsibleID' => $this->responsibleID,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
