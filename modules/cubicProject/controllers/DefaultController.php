<?php

namespace app\modules\cubicProject\controllers;

use Yii;
use yii\web\Controller;
use app\modules\cubicProject\models\ProjectSearch;
use app\modules\cubicProject\models\TaskSearch;

class DefaultController extends Controller
{

    public function actionIndex()
    {

        $searchProject = new ProjectSearch();
        $dpProjectList = $searchProject->search(Yii::$app->request->queryParams);

        $searchTask = new TaskSearch();
        $dpTaskList = $searchTask->search(Yii::$app->request->queryParams);



        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dpProjectList' => $dpProjectList,
            'dpTaskList' => $dpTaskList,
        ]);

//        return $this->render('index');
    }
}
