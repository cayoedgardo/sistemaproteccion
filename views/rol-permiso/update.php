<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermiso */

$this->title = 'Update Rol Permiso: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rol Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-permiso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
