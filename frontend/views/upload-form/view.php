<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadForm */

$this->title = $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Upload Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->test_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->test_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'test_id',
            'avatar',
            'accept',
            'attachment_1',
            'multiple',
        ],
    ]) ?>

</div>
