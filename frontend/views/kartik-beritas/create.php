<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\KartikBeritas */

$this->title = 'Create Kartik Beritas';
$this->params['breadcrumbs'][] = ['label' => 'Kartik Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartik-beritas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
