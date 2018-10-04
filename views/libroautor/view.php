<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibroAutor */

$this->title = $model->id_lib_aut;
$this->params['breadcrumbs'][] = ['label' => 'Libro Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-autor-view">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_lib_aut], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_lib_aut',
            'libro_id',
            'autor_id',
        ],
    ]) ?>

</div>
