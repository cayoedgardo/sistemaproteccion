<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Salida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tipo',
            'descripcion',
            'estado',
            'propiedad_id',
            //'sensor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
