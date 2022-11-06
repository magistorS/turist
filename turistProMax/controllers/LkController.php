<?php

namespace app\controllers;

use app\models\ProblemCreateForm;
use app\models\User;
use app\models\Category;
use app\models\ProblemSearch;
use app\models\regForm;
use app\models\UserSearch;
use app\models\Problem;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii;


/**
 * UserController implements the CRUD actions for User model.
 */
class LkController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
public function ActionSearch(){
    return $this->render('search');
}
    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCreate()
    {
        $model = new ProblemCreateForm();


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
             $model->photoBefore = UploadedFile::getInstance($model, 'photoBefore');
             $newFileName =  md5( $model ->photoBefore->baseName . '.' .$model->photoBefore->extension . time()). '.' .$model->photoBefore->extension;
              $model->photoBefore->saveAs('@app/web/uploads' . $newFileName);

              $model->idUser = Yii:: $app->user->identity->id;

           return $this->redirect(['/lk']);
            }
        } else {
            $model->loadDefaultValues();
        }
        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'categories'=>$categories
        ]);
    }
}
