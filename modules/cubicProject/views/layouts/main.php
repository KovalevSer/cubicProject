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
//                echo Nav::widget([
//                    'items' => [
//                        [
//                            'label' => 'Home',
//                            'url' => ['default/index'],
//                        ],
//                        [
//                            'label' => 'Projects',
//                            'items' => [
//                                ['label' => 'Project List', 'url' => ['projects/index']],
//                                '<li class="divider"></li>',
////                            '<li class="dropdown-header">Dropdown Header</li>',
//                                ['label' => 'New Project', 'url' => ['projects/create']],
//                            ],
//                        ],
//                    ],
//                    'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation
//                ]);
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