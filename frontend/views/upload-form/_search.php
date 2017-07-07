<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFormSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="upload-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'test_id') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'accept') ?>

    <?= $form->field($model, 'attachment_1') ?>

    <?= $form->field($model, 'multiple') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
