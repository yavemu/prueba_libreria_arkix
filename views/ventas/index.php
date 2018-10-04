<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histórico de Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-index">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'libro_titulo',
                'value'=>'libro.titulo'
            ],
            [
                'attribute'=>'cliente_nombre',
                'value'=>'cliente.nombre'
            ],
            [
                'attribute'=>'cliente_apellidos',
                'value'=>'cliente.apellidos'
            ],
            'fecha_venta',
            'valor',
            'vendedor',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
