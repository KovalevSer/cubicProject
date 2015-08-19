<?php

namespace app\modules\cubicProject\controllers;

use Yii;
use yii\web\Controller;
use app\modules\cubicProject\models\ProjectsSearch;
use app\modules\cubicProject\models\TasksSearch;

class DefaultController extends Controller
{

    public function actionIndex()
    {

        $searchProject = new ProjectsSearch();
        $dpProjectList = $searchProject->search(Yii::$app->request->queryParams);

        $searchTask = new TasksSearch();
        $dpTaskList = $searchTask->search(Yii::$app->request->queryParams);



        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dpProjectList' => $dpProjectList,
            'dpTaskList' => $dpTaskList,
        ]);

//        return $this->render('index');
    }
}
