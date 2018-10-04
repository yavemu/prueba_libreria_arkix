<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ventas */

$this->title = $model->libro->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class='title'><?= Html::encode($this->title) ?></h1><hr>

<div class="col-md-6">
    <div class="ventas-view">


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id_venta',
                [
                    'attribute' => '<p class="subtitle">Información del Libro</p>',
                    'value' => '',
                    'type' => 'html',
                ],
                'libro.titulo',
                'fecha_venta',
                'valor',
                'vendedor',
                [
                    'attribute' => '<p class="subtitle">Información del Cliente</p> ',
                    'type' => 'raw',
                    'value' => '',
                ],
                'cliente.nombre',
                'cliente.apellidos',
                'cliente.telefono',
                'cliente.direccion_envio',
            ],
        ]) ?>
    </div>
</div>


<div class="col-md-6">
    <div class="ventas-view">

        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th><p class="subtitle">Historial libros comprados por el cliente</p></th>
                    <th></th>
                </tr> 
            </thead> 
            <tbody>
                <?php foreach ($modelLibroComprados as $value) { ?>
                <tr>
                    <td><?= $value->libro->titulo." <small> (Fecha compra: ".$value->fecha_venta.")</small>" ?></td>
                    <td>
                        <?= Html::a(Html::encode('Ver libro'),Yii::$app->homeUrl.'?r=libros/view&id='.$value->libro->id_libro); ?>
                        |
                        <?= Html::a(Html::encode('Ver compra'),Yii::$app->homeUrl.'?r=ventas/view&id='.$value->id_venta); ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>