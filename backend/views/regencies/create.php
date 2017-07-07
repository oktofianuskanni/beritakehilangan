<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Regencies */

$this->title = 'Create Regencies';
$this->params['breadcrumbs'][] = ['label' => 'Regencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regencies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
