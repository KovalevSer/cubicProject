<?php
namespace app\controllers;

use Yii;
use app\models\demo;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionModules()
    {
        $moduleList = \Yii::$app->getModules();
        return $this->render('moduleList', ['modules' => $moduleList,]);
    }

    public function actionDemo()
    {
        $model = new demo;
        return $this->render('demo', [
            'model' => $model,
        ]);
    }

    public function actionIndex() {
        $module = \Yii::$app->getModule('cubicProject');
        $path = Yii::$app->homeUrl;
        $path = $module->getBasePath();
        return $this->render('index', ['path'=>$path,]);

    }
}