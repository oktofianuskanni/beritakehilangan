<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Beritas */

$this->title = 'Update Beritas: ' . $model->berita_id;
$this->params['breadcrumbs'][] = ['label' => 'Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->berita_id, 'url' => ['view', 'id' => $model->berita_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beritas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
