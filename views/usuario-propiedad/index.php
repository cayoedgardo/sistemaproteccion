<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioPropiedadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Propiedads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-propiedad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Propiedad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'propiedad_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
