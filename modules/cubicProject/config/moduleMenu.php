<?php
return [
    'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation
    'items' => [
//-------------------------------------
//        Main Module Summary
        [
            'label' => 'Home',
            'url' => ['default/index'],
        ],
//--------------------------------------
//      Projects Dropdown Menu
        [
            'label' => 'Projects',
            'items' => [
                ['label' => 'Project List', 'url' => ['project/index']],
                '<li class="divider"></li>',
                ['label' => 'New Project', 'url' => ['project/create']],
            ],
        ],
//--------------------------------------
//      Tasks Dropdown Menu
        [
            'label' => 'Tasks',
            'items' => [
                ['label' => 'Task List', 'url' => ['task/index']],
                '<li class="divider"></li>',
                ['label' => 'New Task', 'url' => ['task/create']],
                ['label' => 'TaskComments', 'url'=>['task-comment/index']]
            ],
        ],

//---------------------------------------
//     Standard Reference Information (SRI) Menu
[
    'label' => 'SRI',
    'items' => [
        ['label'=>'Task Statuses', 'url'=> ['task-status/index']],
    ]
]
    ],

];