<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = 'Update Salida: ' . $model->tipo;
$this->params['breadcrumbs'][] = ['label' => 'Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salida-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
