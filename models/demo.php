<?php

namespace app\models;

use Yii;
use yii\base\Model;

class demo extends Model {
    public $helloString;

    function __construct() {
        $this->helloString = 'Hello world';
    }

    public function sayHello() {
    return $this->helloString;
}
}