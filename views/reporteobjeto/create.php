<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reporteobjeto */

$this->title = 'Create Reporteobjeto';
$this->params['breadcrumbs'][] = ['label' => 'Reporteobjetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporteobjeto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
