<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\ArrayHelper;
use app\models\Tag;
use app\models\Propiedad;
/* @var $this yii\web\View */
/* @var $model app\models\Objeto */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Objetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objeto-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
            'marca',
            'tipo',
            'modelo',
            [
                'attribute' => 'estado',
                'label' =>'Estado',

                //'format' => 'raw',
                'value' => function ($model) {
                    if($model->estado == 0){
                        return 'Robado';
                    }else
                    return 'Protegido';
                    
                },
                
            ],
            'serie',
            'ultima_actualizacion',
            
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
            'precio',
            
        ],
    ]) ?>

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
</div>
