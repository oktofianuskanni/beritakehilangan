<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Beritas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beritas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'jenis_berita')->dropDownList([ 'Kehilangan' => 'Kehilangan', 'Ditemukan' => 'Ditemukan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'judul_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_berita')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_kejadian')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hub_email')->textInput() ?>

    <?= $form->field($model, 'no_telp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_bb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hub_wa')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'province_id')->textInput() ?>

    <?= $form->field($model, 'regency_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'village_id')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'tampilkan_alamatlengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tampilkan_notelp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tampilkan_notelp2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hub_pin_bb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_ditemukan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tampil_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
