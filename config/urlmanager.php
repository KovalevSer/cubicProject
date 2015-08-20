<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'project\/<projectid:[\w\/_-]+>\/tasks\/<id:[\w\/_-]+>' => 'cubicProject/task/view',
        'project\/<projectID:[\w\/_-]+>\/tasks' => 'cubicProject/task/index',

        'project' => 'cubicProject/default/index',
        'project\/<id:[\w_\/-]+>' => 'cubicProject/project/view',

    ]
];