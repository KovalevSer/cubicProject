<?php
use yii\helpers\Html;
use yii\base\Module;

//echo $modules;
foreach ($modules as $module) {

    if (is_object($module)) { ?>

        <?= Html::a($module->id, $module->controllerNamespace); ?>
        <?= Html::tag('br'); ?>

<?php
    }
if (is_array($module)) {
    print_r(array_values($module));
}
} ?>
