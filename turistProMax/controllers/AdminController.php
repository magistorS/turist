<?php

namespace app\controllers;

use app\models\User;
use app\models\regForm;
use app\models\UserSearch;
use app\models\OrderSearch;

use app\models\AdminSearch;
use app\models\Orderrr;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserController implements the CRUD actions for User model.
 */
class AdminController extends Controller
{
//    public function beforeAction($action){
//        if(Yii::$app->user->isGuest || Yii::$app->user->indentity->admin!=1){
////            $this->redirect(['/site/login']);
////            return false;
//        }
//        if (!parant::beforeAction($action)){
//            return false;
//        }


    public function actionIndex()
    {

        $searchModel = new OrderSearch();

        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
