<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Sensor;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SensorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'descripcion',
            'modelo',
            [
                'attribute' => 'estado',
                'label' =>'Estado',

                //'format' => 'raw',
                'value' => function ($model) {
                    if($model->estado == 1){
                        return 'Activado';
                    }
                    
                },
                'filter' => ArrayHelper::map(Sensor::find()->all(),'id','estado','estado'),
            ],
            //'fecha_modificacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
