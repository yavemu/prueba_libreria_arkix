<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_publicacion')->widget(DatePicker::classname(), [
            'options' => [
                'value' => empty($model->fecha_publicacion) ? null : date("Y-m-d", strtotime($model->fecha_publicacion))
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'edicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'precio_sugerido')->textInput() ?>

    <?= $form->field($model, 'valoracion')->dropDownList([ 'Extraordinario' => 'Extraordinario', 'Excelente' => 'Excelente', 'Bueno' => 'Bueno', 'Dañado' => 'Dañado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'descripcion_valoracion')->textInput(['maxlength' => true]) ?>
    
    <?php $data = ArrayHelper::map($modelAutores->find()->where([])->asArray()->all(),'id_autor', 
        function($modelAutores) {
            return $modelAutores['nombre'].' '.$modelAutores['apellidos'];
        });  
    
        $existentes = '';
        if (!empty($model->id_libro)) {
            $existentes = ArrayHelper::map($modelLibroAutor->find()->where(['libro_id' => $model->id_libro])->asArray()->all(),'autor_id','autor_id');
        }
    ?>
    
    
    <?= $form->field($modelLibroAutor, 'autor_id')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'es',
            'options' => [
                'value'=> $existentes,
            ],
            'pluginOptions' => [
                'tags'=>true,
                'allowClear' => true,
                'multiple' => true,
            ],
        ]);
    ?>

    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
