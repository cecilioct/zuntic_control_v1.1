<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\HuespedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Huespedes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huesped-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <img src="../../imagenes/huesped.jpg" style="width:20%"><style> img{margin-left: 0%;}</style>

    <p><br>
        <?= Html::a('Crear Huesped', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'telefono',
            'correo',
            'id_habitacion',
            //'id_estancia',
            //'creado_el',
            //'actualizado_el',
            //'creado_por',
            //'actualizado_por',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
