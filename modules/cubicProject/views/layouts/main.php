<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\base\Controller;

$this->beginContent('@app/views/layouts/main.php');
?>


    <div class="wrap ">
        <div>
            <div style="float: left">
                <?php
//echo $this->context->getControllerPath();
                echo Nav::widget( require (__DIR__ . '/../../config/moduleMenu.php'));
                ?>
            </div>
            <div style="float: right">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="wrap"
        <?= $content; ?>
    </div>
<?php $this->endContent(); ?>