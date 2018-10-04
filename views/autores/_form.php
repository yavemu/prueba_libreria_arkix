<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Autores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio_nacimiento')->widget(DatePicker::classname(), [
            'options' => [
                'value' => empty($model->anio_nacimiento) ? null : date("Y-m-d", strtotime($model->anio_nacimiento))
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'anio_fallecido')->widget(DatePicker::classname(), [
            'options' => [
                'value' => empty($model->anio_fallecido) ? null : date("Y-m-d", strtotime($model->anio_fallecido))
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
