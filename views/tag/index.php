<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'etiqueta',
            [
                'attribute' => 'estado',
                'label' =>'Estado',

                //'format' => 'raw',
                'value' => function ($model) {
                    if($model->estado == 1){
                        return 'En Uso';
                    }
                    
                },
                
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
