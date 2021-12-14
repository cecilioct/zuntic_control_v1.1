<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TipoHabitacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Habitaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-habitacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <img src="../../imagenes/tiposh.jpg" style="width:20%"><style> img{margin-left: 0%;}</style>

    <p><br>
        <?= Html::a('Create Tipo Habitacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tipo',
            'precio',
            'numero',
            'planta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
