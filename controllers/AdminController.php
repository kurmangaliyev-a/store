<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\filters\AccessControl;

class AdminController extends Controller
{

        public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        $this->layout = 'admin-layout';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $dataProvider = new ActiveDataProvider([
                'query' => Order::find(),
            ]);
            return $this->render('index', compact('dataProvider'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $dataProvider = new ActiveDataProvider([
                'query' => Order::find(),
            ]);
            $this->layout = 'admin-layout';
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->goHome();
        }
    }


    public function actionView($id)
    {
        if (!Yii::$app->user->isGuest) {
            $this->layout ='admin-layout';
            return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
        }else{
        return $this->goHome();
    }
    }


    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {
            $this->layout = 'admin-layout';
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->goHome();
        }
    }


    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->goHome();
        }
    }


    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
