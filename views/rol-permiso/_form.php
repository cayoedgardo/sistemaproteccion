<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermiso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-permiso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rol_id')->textInput() ?>

    <?= $form->field($model, 'permiso_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
