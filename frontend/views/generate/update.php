<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Generate */

$this->title = 'Update Generate: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Generates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="generate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
