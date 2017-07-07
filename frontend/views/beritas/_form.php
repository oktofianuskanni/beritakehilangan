<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use backend\models\Category;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Beritas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beritas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php  echo $form->field($model, 'category_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Category::find()->All(),'category_id','category_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Company Name'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
     ?>
     
    <?= $form->field($model, 'jenis_berita')->dropDownList([ 'Kehilangan' => 'Kehilangan', 'Ditemukan' => 'Ditemukan', ], ['prompt' => '']) ?>

<!--     <?= $form->field($model, 'judul_berita')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'deskripsi_berita')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_kejadian')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
    
    <?php 
        $get_id = User::find()->where(['username' => Yii::$app->user->identity->username])->one();
       
        echo $form->field($model, 'email')->textInput([
            'attribute'=>'email',
            'value'=>$get_id->email,

        ]);
    ?>

    <!-- <?= $form->field($model, 'hub_email')->textInput() ?> -->

    <?php        
        echo $form->field($model, 'no_telp1')->textInput([
            'attribute'=>'email',
            'value'=>$get_id->telephone,

        ]);
    ?>

    <?php        
        echo $form->field($model, 'no_telp2')->textInput([
            'attribute'=>'email',
            'value'=>$get_id->mobile_handphone,

        ]);
    ?>

    <?php        
        echo $form->field($model, 'pin_bb')->textInput([
            'attribute'=>'email',
            'value'=>$get_id->pin_bb,

        ]);
    ?>

     <?php 
        $list = ['Bisa dihubungi lewat WA'];
        echo $form->field($model,'hub_wa')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
    ?>


     <?= \kato\DropZone::widget([
           'options' => [
               'url'=>'index.php?r=beritas/upload',
               'maxFilesize' => '2',

           ],
           'clientEvents' => [
               'complete' => "function(file){console.log(file)}",
               'removedfile' => "function(file){alert(file.name + ' is removed')}"
           ],
       ]);
    ?> 



    <br>
     <!-- <?= $form->field($model, 'province_id')->textInput() ?>

    <?= $form->field($model, 'regency_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'village_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
