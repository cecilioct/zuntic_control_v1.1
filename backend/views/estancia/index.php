<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EstanciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estancia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <img src="../../imagenes/estancia.jpg" style="width:20%"><style> img{margin-left: 0%;}</style>

    <p><br>
        <?= Html::a('Crear Estancia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_entrada',
            'fecha_salida',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
