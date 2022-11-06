<?php

namespace app\controllers;

use app\models\Orderrr;
use app\models\Goest;
use app\models\User;
use phpDocumentor\Reflection\Types\True_;
use Yii;
use yii\db\BaseActiveRecord;
use yii\db\ActiveRecord;
use yii\rest\CreateAction;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\Tovar;
use app\models\Problem;
use app\models\Comment;
use app\models\Zakaz;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new Orderrr();
        $varInView = Goest::find()->all();
        return $this->render('goest', ['model' => $model, 'varInView'=> $varInView]);
   

    }

    public function actionGoest(){

        $model = new Goest();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['goest']);
            }
        } else {
            $model->loadDefaultValues();
        }
        //return $this->render('signup', ['model' => $model]);
        return $this->render('goest', ['model' => $model]);
        //return $this->render('checkout', [
        //    'model' => $model
        // ]);
    }


    public function actionCatalog(){
      
        return $this->render('catalog',[
           
        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSend($id)
    {

    }
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


public function actionPremium(){
    return $this->render('premium');
}

    public function actionCheckout()
    {

        $model = new Orderrr();
  
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['checkout']);
            }
        } else {
            $model->loadDefaultValues();
        }
        //return $this->render('signup', ['model' => $model]);
return $this->render('checkout', ['model' => $model,]);
        //return $this->render('checkout', [
        //    'model' => $model
       // ]);
    }







}
