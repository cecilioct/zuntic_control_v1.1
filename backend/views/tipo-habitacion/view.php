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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
