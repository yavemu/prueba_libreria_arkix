<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = "Libro: ".$model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Libros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

    <div class="col-md-12">
        <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'titulo',
                'editor',
                'fecha_publicacion',
                'edicion',
                'costo',
                'precio_sugerido',
                'valoracion',
                'descripcion_valoracion',
                'estado',
            ],
        ]) ?>
    </div>

    <div class="col-md-6">
        
            <table class="table table-striped table-bordered"> 
                <thead> 
                    <tr> 
                        <th><p class="subtitle">Autor(es)</p></th>
                        <th></th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php foreach ($modelLibroAutor as $value) { ?>
                    <tr>
                        <td><?= $value->autor->nombre." ".$value->autor->apellidos; ?></td>
                        <td><?= Html::a(Html::encode('Ver autor'),Yii::$app->homeUrl.'?r=autores/view&id='.$value->autor_id); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
                    
    </div>

    <div class="col-md-6">
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_libro], ['class' => 'btn btn-primary pull-right']) ?>
    
        <?= Html::a('Vender', ['ventas/create', 'id' => $model->id_libro], ['class' => 'btn btn-danger pull-right']) ?>    
    </p>
    </div>
    
    
</div>
