<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<body style= "background-color: orange">
    
    </body>
    
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, llena los campos para continuar:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Crear', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?><img src="../../imagenes/usuario.png" style="width:90%;margin-left:130%;margin-top:-350px;" >
                </div>
                
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>