<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tag;
use app\models\Propiedad;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Objeto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objeto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropdownlist(['1'=> 'Activo','0'=> 'Inactivo']) ?>

    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ultima_actualizacion')->textInput() ?>

    

    <?php 
        echo $form->field($model, 'tag_id')
        ->dropDownList(
        ArrayHelper::map(Tag::find()->where(['estado' => '1', 'estado_uso' => '0'])->all(), 'id', 'etiqueta'));
    ?>

    <?php 
        echo $form->field($model, 'propiedad_id')
        ->dropDownList(
        ArrayHelper::map(Propiedad::find()->where(['estado' => '1'])->all(), 'id', 'nombre'));
    ?>

    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
