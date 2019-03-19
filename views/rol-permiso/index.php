<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolPermisoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rol Permisos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-permiso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rol Permiso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rol_id',
            'permiso_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
