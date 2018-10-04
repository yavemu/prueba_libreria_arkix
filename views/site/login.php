<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class='title'><?= Html::encode($this->title) ?></h1><hr>
<div class="col-md-6">
    <div class="site-login">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="col-md-6">
    <div class="col-md-offset-1" style="color:#999;">
        <br>
        <br>
        Para ingresar usar uno de los siguientes usuarios:
        <br><strong>empleado1/empleado1</strong> 
        <br><strong>empleado2/empleado2</strong>.<br>
    </div>
</div>