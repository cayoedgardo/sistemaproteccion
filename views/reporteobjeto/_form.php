<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reporteobjeto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporteobjeto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reporte_id')->textInput() ?>

    <?= $form->field($model, 'objeto_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
