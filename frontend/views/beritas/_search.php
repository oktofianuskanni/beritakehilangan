<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beritas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'placeholder'=>'Masukkan kata kunci (Mis: No. KTP/ Nama/ Plat Nomor)']) ?>
<!--         <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
