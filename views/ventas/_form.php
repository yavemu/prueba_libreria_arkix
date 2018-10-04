<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ventas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6">
    <div class="libros-view">
        <p class="subtitle">Información del Libro</p>

        <?= DetailView::widget([
            'model' => $modelLibro,
            'attributes' => [
                'titulo',
                'editor',
                'fecha_publicacion',
                'edicion',
                'costo',
                'precio_sugerido',
                'valoracion',
                'descripcion_valoracion',
                // 'estado',
            ],
        ]) ?>
    </div>
</div>

<div class="col-md-6">
    <div class="ventas-form">
    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map($modelCliente->find()->where([])->asArray()->all(),'id_cliente', 
        function($modelCliente) {
            return $modelCliente['nombre'].' '.$modelCliente['apellidos'];
        });  
    ?>

    <?= $form->field($model, 'cliente_id')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'es',
            'options' => [
                'placeholder' => '',
            ],
            'pluginOptions' => [
                // 'tags'=>true,
                'allowClear' => true,
                // 'multiple' => false,
            ],
        ]);
    ?>

    <?= $form->field($model, 'fecha_venta')->widget(DatePicker::classname(), [
            'options' => [
                'value' => empty($model->fecha_venta) ? null : date("Y-m-d", strtotime($model->fecha_venta))
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>
