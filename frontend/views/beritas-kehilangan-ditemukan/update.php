<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukan */

/*$this->title = 'Update Berita: ' . $model->berita_id;*/
$this->params['breadcrumbs'][] = ['label' => 'Beritas Kehilangan Ditemukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->berita_id, 'url' => ['view', 'id' => $model->berita_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beritas-kehilangan-ditemukan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
