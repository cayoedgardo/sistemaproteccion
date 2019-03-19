<?php

namespace app\controllers;

use Yii;
use app\models\Objetorobado;
use app\models\ObjetorobadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Tag;
use app\models\Objeto;
use app\models\Sensor;
use app\models\Salida;
use app\models\Propiedad;


use kartik\mpdf\Pdf;
/**
 * ObjetorobadoController implements the CRUD actions for Objetorobado model.
 */
class ObjetorobadoController extends Controller
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
     * Lists all Objetorobado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjetorobadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelObjeto = Objeto::find()->where(['estado' => '0'])->all();

       
     
        $objeto = array();
        $propiedad = array();
        $objetosAux =  array();
        $i=0;
        $total=0;
        $modelsProvider = $dataProvider->getModels();
        foreach($modelsProvider as $provider){
            $objetosAux[$i] = $provider;
            $objeto[$i] = Objeto::find()->where(['id' => $objetosAux[$i]->objeto_id])->one();
            $propiedad[$i] = Propiedad:: find()->where(['id' => $objeto[$i]->propiedad_id])->one();
            $total = $objeto[$i]->precio + $total;
            $i++;

        }
        $group = array();
        $posicion = array();
        $j=0;
        $u=1;
        $propiedadrobada = array();
        $group[0] = $propiedad[0];
        $propiedadrobada[0] = $group[0];

        if(count($propiedad) > 1){
            for($j=0;$j<$i-1;$j++) {

                if($propiedad[$j] != $propiedad[$j+1]){
                    $group[$j+1] = $propiedad[$j+1];
                    $propiedadrobada[$u] = $group[$j+1];
                    $u++;
                }else{
                    $group[$j+1] = null;
                }
                
                
            }
        }else{
            $propiedadrobada[0] = $propiedad[0];
        }
        
        
        /*
        $z=0;
        for($j=0;$j<count($group);$j++) {
            
            if($j == $posicion[$z]){
                $propiedadrobada[$z] = $group[$j];
                $z++;
            }else{

            }
        }
        */
        //var_dump($objeto[3]);
        //die();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'objetoRobado' => $objeto,
            'modelObjetoRobado' => $modelObjeto,
            'i' => $i,
            'total' => $total,
            'grouppropiedad' => $propiedadrobada,
            'p' => $u,
        ]);
    }

    /**
     * Displays a single Objetorobado model.
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
     * Creates a new Objetorobado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objetorobado();

        $allow = Yii::$app->request->get('allow');
        $etiqueta = Yii::$app->request->get('id');
        $sensor = Yii::$app->request->get('sensor');
        
        
        
        if($etiqueta){

            $modelTag = Tag::find()->where(['etiqueta' => $etiqueta])->one();
            $modelObjeto = Objeto::find()->where(['tag_id' => $modelTag->id])->one();
            $modelSensor = Sensor::find()->where(['id' => $sensor])->one();
            $modelSalida = Salida::find()->where(['sensor_id' => $modelSensor->id])->one();

            $existe = Objetorobado::find()->where(['objeto_id' => $modelObjeto->id])->one();
            
            if(!$existe){

                echo "paso el allow";
                var_dump($modelTag->id);
                if($modelObjeto){
                    $model->salida_id = $modelSalida->id;
                    $model->objeto_id = $modelObjeto->id;
                    $modelObjeto->estado = 0;
                    $model->fecha = date('Y-m-d H:i:s');
                    echo "paso el modelObjeto";
                    if($model->save()){
                        echo "paso el save";

                        if($modelObjeto->save()){
                            Yii::$app -> mailer -> compose()
                            -> setFrom('snash_mudra@hotmail.com')
                            -> setTo('aupart@live.com')
                            -> setSubject('Reporte de robo')
                            -> setTextBody('Ha ocurrido un robo')
                            -> setHtmlBody('<b> El Objeto '. ($modelObjeto->nombre).' '.($modelObjeto->modelo). ' Marca '.($modelObjeto->marca) .' avaluado en $'.($modelObjeto->precio). ' ha salido de las dependencia de la biblioteca con fecha  </b>'.$model->fecha)
                            -> send();
                        return $this->redirect(['view', 'id' => $model->id]);
                        }
                        
                    }
                }
            }
            
        }
        

        else{
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionReport() {

        $searchModel = new ObjetorobadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelObjeto = Objeto::find()->where(['estado' => '0'])->all();

       
     
        $objeto = array();
        $propiedad = array();
        $objetosAux =  array();
        $i=0;
        $total=0;
        $modelsProvider = $dataProvider->getModels();
        foreach($modelsProvider as $provider){
            $objetosAux[$i] = $provider;
            $objeto[$i] = Objeto::find()->where(['id' => $objetosAux[$i]->objeto_id])->one();
            $propiedad[$i] = Propiedad:: find()->where(['id' => $objeto[$i]->propiedad_id])->one();
            $total = $objeto[$i]->precio + $total;
            $i++;

        }
        $group = array();
        $posicion = array();
        $j=0;
        $u=1;
        $propiedadrobada = array();
        $group[0] = $propiedad[0];
        $propiedadrobada[0] = $group[0];

        if(count($propiedad) > 1){
            for($j=0;$j<$i-1;$j++) {

                if($propiedad[$j] != $propiedad[$j+1]){
                    $group[$j+1] = $propiedad[$j+1];
                    $propiedadrobada[$u] = $group[$j+1];
                    $u++;
                }else{
                    $group[$j+1] = null;
                }
                
                
            }
        }else{
            $propiedadrobada[0] = $propiedad[0];
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
        'destination' => Pdf::DEST_BROWSER,
        'content' => $this->renderPartial('generarpdf', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'objetoRobado' => $objeto,
            'modelObjetoRobado' => $modelObjeto,
            'i' => $i,
            'total' => $total,
            'grouppropiedad' => $propiedadrobada,
            'p' => $u,
        ]),
        'options' => [
            // any mpdf options you wish to set
        ],
        'methods' => [
            'SetTitle' => 'Reporte de robo de la Bilioteca UTA',
            'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
            'SetHeader' => ['Reporte de robo generado Bilioteca UTA||Generado en: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
            'SetAuthor' => 'Edgardo Cayo',
            'SetCreator' => 'Edgardo Cayo',
            'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
        ]
    ]);
    return $pdf->render();
    }


    public function actionGenerarpdf()
    {
        $searchModel = new ObjetorobadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelObjeto = Objeto::find()->where(['estado' => '0'])->all();

       
     
        $objeto = array();

        $objetosAux =  array();
        $i=0;
        $total=0;
        $modelsProvider = $dataProvider->getModels();
        foreach($modelsProvider as $provider){
            $objetosAux[$i] = $provider;
            $objeto[$i] = Objeto::find()->where(['id' => $objetosAux[$i]->objeto_id])->one();
            $total = $objeto[$i]->precio + $total;
            $i++;

        }
        //var_dump($objeto[3]);
        //die();


        return $this->render('generarpdf', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'objetoRobado' => $objeto,
            'modelObjetoRobado' => $modelObjeto,
            'i' => $i,
            'total' => $total
        ]);
    }


    /**
     * Updates an existing Objetorobado model.
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
     * Deletes an existing Objetorobado model.
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
     * Finds the Objetorobado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objetorobado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objetorobado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
