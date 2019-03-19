<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Propiedad;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tipo',
            'descripcion',
            [
                'header' => 'Estado',
                
                'content' => function ($model) { 
                    if($model->estado == 1){
                        return 'Activo';
                    }else{
                        return 'Inactivo';
                    }
                    
                }, 
                
                  
            ],
            [
                'attribute' => 'propiedad_id',
                'label' =>'Propiedad',

                //'format' => 'raw',
                'value' => function ($model) {
                    $propiedad = Propiedad::findOne($model->propiedad_id);
                    return $propiedad->nombre.' '.$propiedad->direccion;
                },
                'filter' => ArrayHelper::map(Propiedad::find()->all(),'id','nombre', 'direccion'),
            ],
            
            //'sensor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
