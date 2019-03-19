<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */


?>


<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    </div>
</nav>


<h1> Portal</h1>

<div class="usuario-view col-md-4">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'nombre',
            'apellido',
            'mail',
        ],
    ]) ?>

</div>







<div class="col-md-6">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Acciones</h3>
  </div>
    
  <table class="table">
    <tr><td> <b><?= Html::a('Estado de Robos', ['estadorobo'], []) ?> </td></tr>
    <tr><td> <b><?= Html::a('Reportes', ['estadorobo'], []) ?> </td></tr>
    <tr><td> <?= Html::a('Agregar objeto', ['objeto/create'], []) ?> </td></tr>
    <tr><td> <?= Html::a('Agregar Propiedad', ['propiedad/create'], []) ?> </td></tr>
    <tr><td> <?= Html::a('Ver Objetos', ['objeto/index'], []) ?> </td></tr>
    <tr><td> <?= Html::a('Ver Propiedades', ['propiedad/index'], []) ?> </td></tr>
    <tr><td> <?= Html::a('Ver Tag', ['tag/index'], []) ?> </td></tr>
    
  </table>

</div>

</div>