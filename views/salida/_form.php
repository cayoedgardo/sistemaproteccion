<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Sensor;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Salida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    

   

    <?php 
        echo $form->field($model, 'sensor_id')
        ->dropDownList(
        ArrayHelper::map(Sensor::find()->where(['utilizado' => '0'])->all(), 'id', 'nombre'));
    ?>


    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
