<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cubicProject\models\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', Url::toRoute(['project/task-create']), ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'projectID',
            'name',
            'status',
            'priority',
            // 'description:ntext',
            // 'parentTask',
            // 'waitListID',
            // 'progress',
            // 'created',
            // 'startDate',
            // 'finishDate',
            // 'authorID',
            // 'responsibleID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
