<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OcupacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*                                                         */

$this->title = 'Ocupaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocupacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <img src="../../imagenes/ocupacion.jpg" style="width:20%"><style> img{margin-left: 0%;}</style>

    <p><br>
        <?= Html::a('Create Ocupacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
