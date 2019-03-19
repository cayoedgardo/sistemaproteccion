<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Permiso */

$this->title = 'Create Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permiso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
