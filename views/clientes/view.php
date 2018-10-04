<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Cliente: '.$model->nombre." ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class='title'><?= Html::encode($this->title) ?></h1><hr>
<div class="col-md-6">
    <div class="clientes-view">


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'apellidos',
                'telefono',
                'direccion_envio',
            ],
        ]) ?>

        <p>
            <?= Html::a('Modificar', ['update', 'id' => $model->id_cliente], ['class' => 'btn btn-primary pull-right']) ?>
        </p>
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
                    <td><b><?= $value->libro->titulo."</b> - <small>(Fecha compra: ".$value->fecha_venta.")</small>" ?></td>
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
