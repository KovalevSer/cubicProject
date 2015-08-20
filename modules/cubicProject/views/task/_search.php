<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cubicProject\models\TasksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'projectID') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'parentTask') ?>

    <?php // echo $form->field($model, 'waitListID') ?>

    <?php // echo $form->field($model, 'progress') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'startDate') ?>

    <?php // echo $form->field($model, 'finishDate') ?>

    <?php // echo $form->field($model, 'authorID') ?>

    <?php // echo $form->field($model, 'responsibleID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
