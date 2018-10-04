<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = 'Registrar Libro';
$this->params['breadcrumbs'][] = ['label' => 'Libros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-create">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
        'modelLibroAutor' => $modelLibroAutor,
        'modelAutores' => $modelAutores,
    ]) ?>

</div>
