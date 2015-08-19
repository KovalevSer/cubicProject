<?php
namespace app\assets;

use yii\web\AssetBundle;

class MyBundle extends AssetBundle{

    public $sourcePath = '@app/assets';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}