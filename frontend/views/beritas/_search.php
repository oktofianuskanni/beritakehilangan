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


	<label class="sr-only" for="example">Email</label>
	     <?php echo $form->field($model, 'globalSearch', [
	           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
	     ])->textInput()->input('globalSearch', ['placeholder' => "Masukkan kata kunci (Mis: No. KTP/ Nama/ Plat Nomor)"])->label(false); ?>


    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
<!--         <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
