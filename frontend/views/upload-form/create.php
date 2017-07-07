<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UploadForm */

$this->title = 'Create Upload Form';
$this->params['breadcrumbs'][] = ['label' => 'Upload Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
