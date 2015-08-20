<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\modules\cubicProject\models\Tasks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=
    Html::encode($model->getProjectName())
    ?>
    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'projectID',
            'name',
            'status',
            'priority',
            'description:ntext',
            'parentTask',
            'waitListID',
            'progress',
            'created',
            'startDate',
            'finishDate',
            'authorID',
            'responsibleID',
        ],
    ])
    ?>

    <h1>Task Comments: <?= Html::encode($model->getTaskComments()->count) ?></h1>
    <?=
    ListView::widget([
        'dataProvider' => $model->getTaskComments(),
        'itemView' => function ($model) {
            echo '<tr><td>' . $model->message . '</td><td>' . $model->userID . '</td><td>' . $model->postedTime . '</td></tr>';
        }
    ]);
    ?>

    <h2>Subtasks</h2>
    <?php
    foreach ($model->getChildTasks() as $child) {
       echo Html::a($child->name, ['task/view', 'id'=>$child->id,] );
//        echo '<br>' . $child->name;
    }
    ?>

    <?php
    //    ListView::widget([
    //        'dataProvider' => $model->getChildTasks(),
    //        'itemView'=> function($model, $key) {
    //            echo '<tr><td>' . $model->id . '</td><td>' . $model->name . '</td><td>' . $model->created . '</td></tr>';
    //        }
    //    ])
    ?>

</div>
