<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibroAutor */

$this->title = 'Modificar: ' . $model->id_lib_aut;
$this->params['breadcrumbs'][] = ['label' => 'Libro Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lib_aut, 'url' => ['view', 'id' => $model->id_lib_aut]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="libro-autor-update">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
