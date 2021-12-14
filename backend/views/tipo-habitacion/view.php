<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoHabitacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Habitacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-habitacion-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <center>
        <h1 ><strong> INFORMACION DEL TIPO DE CUARTO </strong> </h1>
    </center>
    <p>
        <?= Html::a('actualizar informacion', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('eliminar informacion', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'seguro que quieres borrar la informacion?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tipo',
            'precio',
            'numero',
            'planta',
        ],
    ]) ?>
    <center>
        <h1 ><strong> INFORMACION DE LA HABITACION </strong> </h1>
    </center>
    <?= Html::a('registrar habitacion', ['habitacion/create', 'id_tipo_habitacion' => $model->id], ['class' => 'btn btn-success']) ?>

</div>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tipo_habitacion',
            'id_estado',

            ['class' => 'yii\grid\ActionColumn','controller' => 'habitacion'],
        ],
    ]); ?>
