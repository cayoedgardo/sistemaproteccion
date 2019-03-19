<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propiedad */

$this->title = 'Actualizar Propiedad ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Propiedads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propiedad-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
