<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\modules\cubicProject\models\Project;
use app\modules\cubicProject\models\TaskStatus;


/* @var $this yii\web\View */
/* @var $model app\modules\cubicProject\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $prjArr = Project::getProjectArr();
    array_unshift($prjArr, '');

     echo $form->field($model, 'projectID')->dropDownList($prjArr) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $stArr = TaskStatus::getTaskStatusArr();
//    array_unshift($stArr, '');
    echo $form->field($model, 'status')->dropDownList($stArr); ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parentTask')->textInput() ?>

    <?= $form->field($model, 'waitListID')->textInput() ?>

    <?= $form->field($model, 'progress')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'startDate')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

   <?= $form->field($model, 'finishDate')->widget(\yii\jui\DatePicker::classname(), [
       'language' => 'ru',
       'dateFormat' => 'yyyy-MM-dd',
   ]) ?>

    <?= $form->field($model, 'authorID')->textInput() ?>

    <?= $form->field($model, 'responsibleID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
