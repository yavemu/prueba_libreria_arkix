<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibrosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_libro') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'editor') ?>

    <?= $form->field($model, 'fecha_publicacion') ?>

    <?= $form->field($model, 'edicion') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'precio_sugerido') ?>

    <?php // echo $form->field($model, 'valoracion') ?>

    <?php // echo $form->field($model, 'descripcion_valoracion') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
