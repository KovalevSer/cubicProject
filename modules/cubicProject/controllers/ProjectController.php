<?php

namespace app\modules\cubicProject\controllers;

use Yii;
use app\modules\cubicProject\models\Project;
use app\modules\cubicProject\models\ProjectSearch;
use app\modules\cubicProject\models\Task;
use app\modules\cubicProject\models\TaskSearch;
use app\modules\cubicProject\models\TaskStatus;
use app\modules\cubicProject\models\TaskStatusSearch;
use app\modules\cubicProject\models\TaskComment;
use app\modules\cubicProject\models\TaskCommentSearch;

use yii\web\Session;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\url;


/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectController extends Controller
{
    public $projectID;
    public $session;
    const C_PROJECT_ID_PARAM = 'ProjectID';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

//    public function __construct() {
//        $this->session = new Session;
//        $this->session->open();
//    }

    public function actionIndex()
    {

        $searchProject = new ProjectSearch();
        $dpProjectList = $searchProject->search(Yii::$app->request->queryParams);

//        $searchTask = new TaskSearch();
//        $dpTaskList = $searchTask->search(Yii::$app->request->queryParams);


        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dpProjectList' => $dpProjectList,
//            'dpTaskList' => $dpTaskList,
        ]);

//        return $this->render('index');
    }

    /**
     * Lists all Projects models.
     * @return mixed
     */
    public function actionProjectlist()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('projectlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionTasklist($projectid)
    {

        $searchModel = new TaskSearch();
        $queryPar = array();
        if (isset($projectid)) {
            array_push($queryPar, ['projectID' => $projectid]);
        }

//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search($queryPar);

        return $this->render('../task/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskView($id)
    {
        return $this->render('../task/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTaskCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['../task/view', 'id' => $model->id]);
        } else {
            return $this->render('../task/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single Projects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = null)
    {

        if (!isset($id)) {
            $this->actionIndex();
        }

        //        $this->projectID=$id;

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionEnter($id)
    {
        if (!isset($id)) {
            $this->actionIndex();
        }

//        Yii::$app->getModule('cubicProject')->session['ProjectID'] = $id;
        \Yii::$app->session['ProjectID'] = $id;

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);



    }


    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['../task/view', 'id' => $model->id]);
        } else {
            return $this->render('../task/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['../task/index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTaskModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

//*********************************************************************************
//          Task Statuses
//*********************************************************************************
    /**
     * Lists all TaskStatus models.
     * @return mixed
     */
    public function actionTaskStatusList()
    {
        $searchModel = new TaskStatusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TaskStatus model.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskStatusView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaskStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTaskStatusCreate()
    {
        $model = new TaskStatus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TaskStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskStatusUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TaskStatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskStatusDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaskStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTaskStatusModel($id)
    {
        if (($model = TaskStatus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

//*********************************************************************************
//          Task Notes
//*********************************************************************************

    /**
     * Lists all TaskComment models.
     * @return mixed
     */
    public function actionTaskNoteList($taskId)
    {
        $searchModel = new TaskCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TaskComment model.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskNoteView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaskComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTaskNoteCreate()
    {
        $model = new TaskComment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TaskComment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskNoteUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TaskComment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTaskNoteDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaskComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTaskNoteModel($id)
    {
        if (($model = TaskComment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
