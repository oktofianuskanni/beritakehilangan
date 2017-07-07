<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\KartikBeritas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kartik-beritas-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'nama_tes')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'file')->fileInput() ?> -->


    <?php
          // echo $form->field($model, 'file')->widget(FileInput::classname(), [
          //     'options' => ['accept' => 'uploads/*'],
          // ]);

        // Usage with ActiveForm and model
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'uploads/*',
            ],
        ]);

    ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
