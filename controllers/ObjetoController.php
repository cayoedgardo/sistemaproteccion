<?php

namespace app\controllers;

use Yii;
use app\models\Objeto;
use app\models\Tag;
use app\models\ObjetoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjetoController implements the CRUD actions for Objeto model.
 */
class ObjetoController extends Controller
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
     * Lists all Objeto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjetoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objeto model.
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
     * Creates a new Objeto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objeto();

        if ($model->load(Yii::$app->request->post())) {

                        

                if($model->save()){

                    $tag = Tag::find()->where(['id' => $model->tag_id])->one();
                    if($tag->etiqueta != '999999999999' ){
                        $tag->estado_uso = 1;                       
                        $tag->save();
                    }
                    
                    return $this->redirect(['view', 'id' => $model->id]);
                }          
                              



        }




        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Objeto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

                        

            if($model->save()){

                $tag = Tag::find()->where(['id' => $model->tag_id])->one();
                if($tag->etiqueta != '999999999999' ){
                    $tag->estado_uso = 1;                       
                    $tag->save();
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }          
                          



    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Objeto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Objeto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objeto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objeto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
