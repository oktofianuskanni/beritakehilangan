<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="upload-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accept')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'multiple')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
