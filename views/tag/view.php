<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = $model->etiqueta;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-view col-md-8" style="align-items: center;">

    

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>


</div>
