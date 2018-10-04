<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Autores */

$this->title = 'Crear Autor';
$this->params['breadcrumbs'][] = ['label' => 'Autores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autores-create">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
