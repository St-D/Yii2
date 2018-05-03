<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Note */
/* @var $form yii\widgets\ActiveForm */

/* <?= $form->field($model, 'user_id')->textInput() ?> */

?>

<div class="note-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'note_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note_topic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
