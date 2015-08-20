<?php
use yii\helpers\url;
use yii\web\Session;

$menu = [
    'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation
    'items' => [
//-------------------------------------
//        Main Module Summary
        [
            'label' => 'Home',
            'url' => Url::toRoute([' ']),
        ],
//--------------------------------------
//      Projects Dropdown Menu
        [
            'label' => 'Projects',
            'items' => [
                ['label' => 'Project List', 'url' => Url::toRoute(['project/projectlist',])],
                '<li class="divider"></li>',
                ['label' => 'New Project', 'url' => Url::toRoute(['project/create',])],
            ],
        ],
    ],
];

if (isset(\Yii::$app->session['ProjectID'])) {
    array_push($menu['items'],
//--------------------------------------
//      Tasks Dropdown Menu
        [
            'label' => 'Tasks',
            'items' => [
                ['label' => 'Task List', 'url' => Url::toRoute(['project/tasklist', 'projectid' => \Yii::$app->session['ProjectID']
                ])],
                '<li class="divider"></li>',
                ['label' => 'New Task', 'url' => Url::toRoute(['project/task-create'])],
                ['label' => 'TaskComments', 'url' => ['task-comment/index']]
            ],
        ]);

    array_push($menu['items'],
//---------------------------------------
//     Standard Reference Information (SRI) Menu
        [
            'label' => 'SRI',
            'items' => [
                ['label' => 'Task Statuses', 'url' => ['task-status/index']],
            ]
        ]);

}

return $menu;