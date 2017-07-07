<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Beritas */

$this->title = 'Create Beritas';
$this->params['breadcrumbs'][] = ['label' => 'Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beritas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
