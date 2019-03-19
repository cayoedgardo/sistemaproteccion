<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Propiedad;
use app\models\Tag;

use kartik\mpdf\Pdf;
use yii\helpers\Url;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objeto-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
        $gridColumns = [
            //'id',
            'nombre',
            'marca',
            //'tipo',
            'precio',
            'modelo',
            //'estado',
            //'serie',
            //'ultima_actualizacion',
            
            [
                'attribute' => 'tag_id',
                'label' =>'Tag',

                //'format' => 'raw',
                'value' => function ($model) {
                    $tag = Tag::findOne($model->tag_id);
                    return $tag->etiqueta;
                },
                
            ],
            [
                'attribute' => 'propiedad_id',
                'label' =>'Propiedad',

                //'format' => 'raw',
                'value' => function ($model) {
                    $propiedad = Propiedad::findOne($model->propiedad_id);
                    return $propiedad->nombre;
                },
                
            ],
            
        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'marca',
            //'tipo',
            'precio',
            'modelo',
            //'estado',
            //'serie',
            //'ultima_actualizacion',
            
            [
                'attribute' => 'tag_id',
                'label' =>'Tag',

                //'format' => 'raw',
                'value' => function ($model) {
                    $tag = Tag::findOne($model->tag_id);
                    return $tag->etiqueta;
                },
                'filter' => ArrayHelper::map(Tag::find()->all(),'id','etiqueta'),
            ],
            [
                'attribute' => 'propiedad_id',
                'label' =>'Propiedad',

                //'format' => 'raw',
                'value' => function ($model) {
                    $propiedad = Propiedad::findOne($model->propiedad_id);
                    return $propiedad->nombre;
                },
                'filter' => ArrayHelper::map(Propiedad::find()->all(),'id','nombre'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
