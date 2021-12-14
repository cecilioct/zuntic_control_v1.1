<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuenta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <img src="../../imagenes/cuenta.jpg" style="width:20%"><style> img{margin-left: 0%;}</style>
    
    <p><br>
        <?= Html::a('Crear Cuenta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'concepto',
            'monto',
            'id_huesped',
            'creado_el',
            //'actualizado_el',
            //'creado_por',
            //'actualizado_por',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
