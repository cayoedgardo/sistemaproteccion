<?php

namespace app\controllers;

use Yii;
use app\models\Tag;
use app\models\TagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Objeto;
/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tag model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Tag();
        $allow = Yii::$app->request->get('allow');
        $etiqueta = Yii::$app->request->get('id');

        //cuando llegan los valores por url
        if ($etiqueta != null && $allow != null){
           $existe = Tag::find()->where(['etiqueta'=>$etiqueta])->one();
            echo('paso el if etiqueta');
           if(!$existe){
            echo('paso el if existe');
                if ($model) {
                    echo('paso el if model');
                    $model->etiqueta = $etiqueta;
                    $model->estado = $allow;
                    $model->estado_uso = 0;
                    if($model->save()){

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                    

                }
           }else{
            echo('existe tag');
           }

            
            

        }
        // cuando no llegan los valores por url
        else{
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        /* //codigo para crear original
        $model = new Tag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        */
        return $this->render('create', [
            'model' => $model,
        ]);




    }

    /**
     * Updates an existing Tag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        

        $objeto = Objeto::find()->where(["tag_id" => $id])->one();
        

        if($objeto == null){

            $this->findModel($id)->delete();

            
        }else{

            
            $tagAux = Tag::find()->where(["etiqueta" => '999999999999'])->one();
            $objeto->tag_id = $tagAux->id;
            if($objeto->save()){
                $this->findModel($id)->delete();
            }

        }
        


        return $this->redirect(['index']);
    }

    /**
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
