<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Villages */

$this->title = 'Update Villages: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Villages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->village_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="villages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
