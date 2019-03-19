<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PropiedadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propiedades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propiedad-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?php $a='a'; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'descripcion',
            'direccion',
            'ubicacion',
            //'cant_persona',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'header' => 'Salidas',
                
                'content' => function ($url, $model) { 
                    return Html::a(
                     '<span class="glyphicon glyphicon glyphicon-plus"> Agregar</span>', 
                     ['salida/create', 'id' => $model], 
                     [ 
                      
                     ] 
                    ); 
                }, 
                
                  
            ],
            [
                'header' => '',
                'content' => function($model) {
                    return Html::a(' Ver', ['salida/salidas'], ['class' => 'btn  glyphicon glyphicon-eye-open']);
                },               
                  
            ],

            

        ],
    ]); ?>
</div>
