<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Objeto */

$this->title = 'Agregar Objeto';
$this->params['breadcrumbs'][] = ['label' => 'Objetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objeto-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
