<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\icons\FontAwesomeAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\Estancia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estancia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'fecha_entrada')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Ingrese la fecha de entrada ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

    <?php
    echo $form->field($model, 'fecha_salida')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Ingrese la fecha de salida ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
