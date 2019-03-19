<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Propiedad */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Propiedads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propiedad-view">

  

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
            'nombre',
            'descripcion',
            'direccion',
            'ubicacion',
            'cant_persona',
            [
                'attribute' => 'estado',
                'label' =>'Estado',

                //'format' => 'raw',
                'value' => function ($model) {
                    if($model->estado == 1){
                        return 'Activo';
                    }else{
                        return 'No Activado';
                    }
                    
                },
                
            ],  
        ],
    ]) ?>

</div>
