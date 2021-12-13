<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Huesped */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Huespedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="huesped-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro desea eliminar al huésped?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'telefono',
            'correo',
            'id_habitacion',
            'id_estancia',
            'creado_el',
            'actualizado_el',
            [ 
                'label' => 'creado_por', 
                'value' => $model->getUserName($model->creado_por) 
            ],
            [ 
                'label' => 'actualizado_por', 
                'value' => $model->getUserName($model->actualizado_por) 
            ],
        ],
    ]) ?>

    <center>
        <h1 ><strong> CUENTAS DEL HUESPED </strong> </h1>
    </center>

    <?= Html::a('Añadir cuenta', ['cuenta/create', 'id_huesped' => $model->id], ['class' => 'btn btn-success']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'concepto',
            'monto',
            //'id_huesped',
            'creado_el',
            'actualizado_el',
            //'creado_por',
            //'actualizado_por',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'cuenta'],
        ],
    ]); ?>
</div>
