<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sensor */


$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
