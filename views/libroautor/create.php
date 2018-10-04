<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LibroAutor */

$this->title = 'Create Libro Autor';
$this->params['breadcrumbs'][] = ['label' => 'Libro Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-autor-create">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
