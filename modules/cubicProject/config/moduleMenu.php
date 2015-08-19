<?php
return [
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
                ['label' => 'Project List', 'url' => ['projects/index']],
                '<li class="divider"></li>',
                ['label' => 'New Project', 'url' => ['projects/create']],
            ],
        ],
//--------------------------------------
//      Tasks Dropdown Menu
        [
            'label' => 'Tasks',
            'items' => [
                ['label' => 'Task List', 'url' => ['tasks/index']],
                '<li class="divider"></li>',
                ['label' => 'New Task', 'url' => ['tasks/create']],
            ],
        ],

    ],
    'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation


];