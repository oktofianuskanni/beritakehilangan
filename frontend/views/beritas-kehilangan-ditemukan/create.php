<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukan */

$this->title = 'Buat Berita';
$this->params['breadcrumbs'][] = ['label' => 'Beritas Kehilangan Ditemukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beritas-kehilangan-ditemukan-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
