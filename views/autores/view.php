<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Autores */

$this->title = 'Autor: '.$model->nombre." ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Autores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

<div class="col-md-6">
    <div class="autores-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'apellidos',
                'anio_nacimiento',
                'anio_fallecido',
            ],
        ]) ?>

        <p>
            <?= Html::a('Modificar', ['update', 'id' => $model->id_autor], ['class' => 'btn btn-primary  pull-right']) ?>
        </p>
    </div>
</div>

<div class="col-md-6">
    <div class="ventas-view">

        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th><p class="subtitle">Historial libros del autor</p></th>
                    <th></th>
                </tr> 
            </thead> 
            <tbody>
                <?php foreach ($modelLibrosAutor as $value) { ?>
                <tr>
                    <td><b><?= $value->libro->titulo."</b> - <small>(Edición: ".$value->libro->edicion.")</small>" ?></td>
                    <td>
                        <?= Html::a(Html::encode('Ver libro'),Yii::$app->homeUrl.'?r=libros/view&id='.$value->libro->id_libro); ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

