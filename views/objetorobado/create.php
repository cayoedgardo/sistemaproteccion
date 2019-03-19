<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Objetorobado */

$this->title = 'Create Objetorobado';
$this->params['breadcrumbs'][] = ['label' => 'Objetorobados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetorobado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
