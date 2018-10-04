<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Autores */

$this->title = 'Modificar: ' . $model->nombre." ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Autores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre." ".$model->apellidos, 'url' => ['view', 'id' => $model->id_autor]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="autores-update">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
