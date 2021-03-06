<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Objetorobado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetorobado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'salida_id')->textInput() ?>

    <?= $form->field($model, 'objeto_id')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
