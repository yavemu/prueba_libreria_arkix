<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ventas */

$this->title = 'Registrar Venta';
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-create">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
        'modelLibro' => $modelLibro,
        'modelCliente' => $modelCliente,
    ]) ?>

</div>
