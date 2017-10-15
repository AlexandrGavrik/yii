<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Task;
use app\models\TaskSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\admin\rules\AuthorRule;

use app\models\User;
use app\controllers\UserController;


class TaskController extends Controller
{
    
        
      public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $tasks1 = $searchModel->search(Yii::$app->request->queryParams);
        
        /*$query = Task::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $tasks = $query->with('status')
            ->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
*/
        return $this->render('index', [
            'tasks1' => $tasks1,
//            'pagination' => $pagination,
            'searchModel'=> $searchModel
        ]);
    }
        
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // valid data received in $model

            // do something meaningful here about $model ...

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('create', ['model' => $model]);
        }
    }
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    
    
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex2()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionView($id)//Update
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view'/*update*/, [
                'model' => $model,
            ]);
        }
    }
    
    public function actionRole(){
     /*   
        $adm = Yii::$app->authManager->createRole('admin');
        $adm->description = 'Администратор';
        Yii::$app->authManager->add($adm);
        
        $content = Yii::$app->authManager->createRole('content');
        $content->description = 'Контент менеджер';
        Yii::$app->authManager->add($content);
        
        $user = Yii::$app->authManager->createRole('user');
        $user->description = 'Пользователь';
        Yii::$app->authManager->add($user);
        
        $role = Yii::$app->authManager->createRole('banned');
        $role->description = 'Заблокированный пользователь';
        Yii::$app->authManager->add($role);
	*//*
		
		$rule = new AuthorRule();
		$permit = Yii::$app->authManager->createPermission('updateOwnTask');
		$permit->description = 'Право на редактирование своих Задач';
		$permit->ruleName = $rule->name;
		Yii::$app->authManager->add($permit);
		
	*//*
		$role_a = Yii::$app->authManager->getRole('admin');
		$permit = Yii::$app->authManager->getPermission('updateTask');
		Yii::$app->authManager->addChild($role_a, $permit);
    *//*
		$userRole = Yii::$app->authManager->getRole('admin');
		Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());
	*/ /*
		$auth=Yii::$app->authManager;
		$rule = new AuthorRule();
		$auth->add($rule);
		
		$permit = Yii::$app->authManager->createPermission('updateOwnTask');
		$permit->description = 'Право на редактирование своих Задач';
		$permit->ruleName = $rule->name;
		Yii::$app->authManager->add($permit);
		
		$role_a = Yii::$app->authManager->getRole('content');
		$permit = Yii::$app->authManager->getPermission('updateOwnTask');
		Yii::$app->authManager->addChild($role_a, $permit);
		
		$permit2 = Yii::$app->authManager->getPermission('updateTask');
		Yii::$app->authManager->addChild($permit, $permit2);
	*/
        return 123412341;
        
        
    }
}