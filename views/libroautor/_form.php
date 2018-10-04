<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibroAutor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libro-autor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libro_id')->textInput() ?>

    <?= $form->field($model, 'autor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
