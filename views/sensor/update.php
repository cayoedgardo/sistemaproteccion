<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sensor */

$this->title = 'Actualizar Sensor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
