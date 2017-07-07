<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukan */

$this->title = 'Create Beritas Kehilangan Ditemukan';
$this->params['breadcrumbs'][] = ['label' => 'Beritas Kehilangan Ditemukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beritas-kehilangan-ditemukan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
