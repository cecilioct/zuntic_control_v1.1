<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Acerca de Zuntic Control';
$this->params['breadcrumbs'][] = $this->title;
?>
<body style= "background-color: lightgray">
<div class="site-about">
    <h1 align="center"><?= Html::encode($this->title) ?></h1><br>

    <h3>Objetivo General:</h3> 
    <p align="justify">Software dedicado a reunir información sobre los diferentes estados en los que se encuentra la habitación,
        desde su disponibilidad y orden de limpieza, hasta el registro de estancia del huésped
        que se encuentre ocupándola. </p> <br>
        <h3>Sobre el Software:</h3> 
    <p align="justify">Es bien sabido que los hoteles hoy en día, tienen información muy valiosa de los huéspedes en sus bases de datos, lo que puede generar conflictos. Si esa información no está bien organizada ni planteada de tal forma que esté a la mano de quien los pretende usar en alguna actividad, complicaría bastante la forma de administrar de manera eficiente.
        Por ello, el sistema estará agrupando información relevante de tres de las áreas del hostal, que serían; el cliente, los cuartos disponibles y el aseo. Así tendremos en una interfaz amigable para el usuario, todos los datos necesarios para su buen uso, además de ahorrar tiempo, ya que el sistema contará con una barra de búsqueda para agrupar los datos en diferentes maneras, tales como orden alfabético, última fecha de ocupación del cuarto, etc. 
</p>   

</div>
