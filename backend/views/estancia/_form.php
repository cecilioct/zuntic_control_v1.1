<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Estancia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estancia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model,'fecha_entrada')->
    widget(DatePicker::className(),[
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <?php echo $form->field($model,'fecha_salida')->
    widget(DatePicker::className(),[
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
