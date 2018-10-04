<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Libros;
use app\models\Autores;
use app\models\LibroAutor;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibrosController implements the CRUD actions for Libros model.
 */
class LibrosController extends Controller
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
     * Lists all Libros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibrosSearch();
        $searchModel->estado = 'Inventario'; 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libros model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelLibroAutor = LibroAutor::find()->where(['libro_id' => $model->id_libro])->all();

        return $this->render('view', [
            'model' => $model,
            'modelLibroAutor' => $modelLibroAutor,
        ]);
    }

    /**
     * Creates a new Libros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Libros();
        $modelLibroAutor = new LibroAutor();
        $modelAutores = new Autores();

        if (!empty($_POST['LibroAutor']) && empty($_POST['LibroAutor']['autor_id'])) {
            $modelLibroAutor->validate();
        }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                
                foreach($_POST['LibroAutor']['autor_id'] as $k => $autor){
                    
                    $modelLibroAutor = new LibroAutor();
                    $modelLibroAutor->libro_id = $model->id_libro;
                    $modelLibroAutor->autor_id = $autor;

                    $modelLibroAutor->save();
                }

                return $this->redirect(['view', 'id' => $model->id_libro]);
            }
        


        return $this->render('create', [
            'model' => $model,
            'modelLibroAutor' => $modelLibroAutor,
            'modelAutores' => $modelAutores,
        ]);
    }

    /**
     * Updates an existing Libros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelLibroAutor = new LibroAutor();
        $modelAutores = new Autores();

        if (!empty($_POST['LibroAutor']) && empty($_POST['LibroAutor']['autor_id'])) {
            $modelLibroAutor->validate();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $modelLibroAutor->deleteAll('libro_id = '.$model->id_libro);

            foreach($_POST['LibroAutor']['autor_id'] as $k => $autor){
                    
                $modelLibroAutor = new LibroAutor();
                $modelLibroAutor->libro_id = $model->id_libro;
                $modelLibroAutor->autor_id = $autor;

                $modelLibroAutor->save();
            }

            return $this->redirect(['view', 'id' => $model->id_libro]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelLibroAutor' => $modelLibroAutor,
            'modelAutores' => $modelAutores,
        ]);
    }

    /**
     * Finds the Libros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Libros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Libros::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
