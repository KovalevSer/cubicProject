<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cubicProject\models\TaskStatus */

$this->title = 'Update Task Status: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
