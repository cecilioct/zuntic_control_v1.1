<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<body style= "background-color: lightblue">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, llena los campos para Ingresar:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="margin:1em 0">
                    Si olvidaste tu contraseña, puedes: <?= Html::a('resetearlo', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> <img src="../../imagenes/usuario2.png" style="width:90%;margin-left:130%;margin-top:-280px;" >
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
