<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ventas */

$this->title = 'Modificar: ' . $model->id_venta;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_venta, 'url' => ['view', 'id' => $model->id_venta]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="ventas-update">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
