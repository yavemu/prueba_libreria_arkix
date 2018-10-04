<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
     <?php
    NavBar::begin([
        // 'brandLabel' => Yii::$app->name,
        'brandLabel' => '<img src="images/logo.png" class="img-responsive"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'HOME', 'url' => ['/site/index']],
            ['label' => 'LIBROS', 'url' => ['/libros'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'AUTORES', 'url' => ['/autores'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'CLIENTES', 'url' => ['/clientes'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'VENTAS', 'url' => ['/ventas'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'LOGIN', 'url' => ['/site/login'], 'visible'=> Yii::$app->user->isGuest],
            ['label' => 'SALIR', 'url' => ['/site/logout'], 'visible'=> !Yii::$app->user->isGuest],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <h2> Prueba Libreria - Yamid Vélez Muñoz </h2>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Yamid Vélez Muñoz - <?= date('Y') ?></p>
        <p class="pull-right">yavemu@gmail.com</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
