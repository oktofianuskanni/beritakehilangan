<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beritas-kehilangan-ditemukan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'berita_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'jenis_berita') ?>

    <?= $form->field($model, 'judul_berita') ?>

    <?php // echo $form->field($model, 'deskripsi_berita') ?>

    <?php // echo $form->field($model, 'tanggal_kejadian') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'hub_email') ?>

    <?php // echo $form->field($model, 'no_telp1') ?>

    <?php // echo $form->field($model, 'no_telp2') ?>

    <?php // echo $form->field($model, 'pin_bb') ?>

    <?php // echo $form->field($model, 'hub_wa') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'regency_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'village_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
