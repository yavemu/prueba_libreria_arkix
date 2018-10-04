<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Libros en Inventario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1 class='title'><?= Html::encode($this->title) ?></h1><hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Libro', ['create'], ['class' => 'btn btn-success create-btn pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titulo',
            'editor',
            'edicion',
            'valoracion',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
