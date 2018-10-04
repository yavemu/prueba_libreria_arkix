<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Modificar Cliente: ' . $model->nombre." ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre." ".$model->apellidos, 'url' => ['view', 'id' => $model->id_cliente]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="clientes-update">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
