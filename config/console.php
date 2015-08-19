<?php
/**
 * Created by PhpStorm.
 * User: pt1c
 * Date: 04.08.2015
 * Time: 13:50
 */

return array(
    'id' => 'cubicTaskDemo',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
    ]
);
