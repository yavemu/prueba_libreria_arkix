<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Ventas;
use app\models\Clientes;
use app\models\Libros;
use app\models\VentasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentasController implements the CRUD actions for Ventas model.
 */
class VentasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update'],
                'rules' => [
                    [
                        'actions' => ['index','view','create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ventas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VentasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ventas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelLibroComprados = Ventas::find()->where(['cliente_id' => $model->cliente_id])->all();

        return $this->render('view', [
            'model' => $model,
            'modelLibroComprados' => $modelLibroComprados,
        ]);
    }

    /**
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Ventas();
        $modelCliente = new Clientes();
        $modelLibro = Libros::find()->where(['id_libro' => $id])->one();

        $model->libro_id = $modelLibro->id_libro;
        $model->valor = $modelLibro->precio_sugerido;
        $model->vendedor = Yii::$app->user->identity->username;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $modelLibro->estado = 'Vendido';
            $modelLibro->save();

            return $this->redirect(['view', 'id' => $model->id_venta]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelLibro' => $modelLibro,
            'modelCliente' => $modelCliente,
        ]);
    }

    /**
     * Finds the Ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ventas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
