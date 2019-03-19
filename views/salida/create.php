<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = 'Crear Salida';
$this->params['breadcrumbs'][] = ['label' => 'Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
