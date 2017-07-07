<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Villages */

$this->title = 'Create Villages';
$this->params['breadcrumbs'][] = ['label' => 'Villages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="villages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
