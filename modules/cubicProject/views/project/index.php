<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="project-default-index">
    <h1>Project Summary
    </h1>

    <h2>Choose a Project</h2>
    <div style='width: 80%;'>
<?php
echo  GridView::widget([
        'dataProvider' => $dpProjectList,
////        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'ProjectName',
                'format' => 'raw',
                'value'=>function ($data) {
//                    return Html::a($data['name'], Url::toRoute(['enter', 'id' => $data['id'],]));
                    return Html::a($data['name'], Url::toRoute(['project/enter', 'id' => $data['id'],]));

                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
  ]);
?>
        </div>

<!--    <h2>My Projects</h2>-->
    <div style='width: 80%;'>
        <?php

//        echo GridView::widget([
//            'dataProvider' => $dpProjectList,
//        ]);
        ?>
    </div>

<!--    <h2>My Tasks</h2>-->
    <div style='width: 80%;'>
        <?php
//
//        echo GridView::widget([
//            'dataProvider' => $dpTaskList,
//        ]);
        ?>
    </div>

</div>
<p>
    This is the view content for action "<?= $this->context->action->id ?>".
    The action belongs to the controller "<?= get_class($this->context) ?>"
    in the "<?= $this->context->module->id ?>" module.
</p>

<p>
    You may customize this page by editing the following file:<br>
    <code><?= __FILE__ ?></code>
</p>
</div>
