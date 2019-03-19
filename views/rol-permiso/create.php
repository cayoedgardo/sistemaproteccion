<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolPermiso */

$this->title = 'Create Rol Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Rol Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-permiso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
