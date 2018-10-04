<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = 'Modificar: ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Libros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->id_libro]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="libros-update">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
        'modelLibroAutor' => $modelLibroAutor,
        'modelAutores' => $modelAutores,
    ]) ?>

</div>
