<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\KartikBeritas */

$this->title = 'Update Kartik Beritas: ' . $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Kartik Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->test_id, 'url' => ['view', 'id' => $model->test_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kartik-beritas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
