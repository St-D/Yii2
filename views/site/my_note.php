<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Создание заметки';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <p>Заполните поля ниже для регистрации:</p>
    <br>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($note_model, 'topic')->textInput(['autofocus' => true]) ?>

    <?= $form->field($note_model, 'text_data')->textInput()->
    hint('растяните поле до удобного размера')->textarea(['rows' => 10]) ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <br>


    <?php if (Yii::$app->session->hasFlash('successfuly')): ?>
    <div class="alert alert-success alert-dismissable col-lg-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    <?php echo Yii::$app->session->getFlash('successfuly'); ?>
    </div>
    <?php endif; ?>



    <?php ActiveForm::end(); ?>


    <div class="col-lg-offset-1" style="color:#999;">
    </div>
</div>
