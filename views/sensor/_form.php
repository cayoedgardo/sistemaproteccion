<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sensor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropdownlist(['1' => 'Activo','0' => 'Inactivo']) ?>

    <?= $form->field($model, 'utilizado')->dropdownlist(['1' => 'En uso','0' => 'Habilitado']) ?>

    <?= $form->field($model, 'fecha_modificacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
