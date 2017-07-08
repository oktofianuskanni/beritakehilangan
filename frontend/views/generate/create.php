<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Generate */

$this->title = 'Create Generate';
$this->params['breadcrumbs'][] = ['label' => 'Generates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
