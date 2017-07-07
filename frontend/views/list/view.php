<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Beritas */

$this->title = $model->berita_id;
$this->params['breadcrumbs'][] = ['label' => 'Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beritas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->berita_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->berita_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'berita_id',
            'user_id',
            'category_id',
            'jenis_berita',
            'judul_berita',
            'deskripsi_berita:ntext',
            'tanggal_kejadian',
            'email:email',
            'hub_email:email',
            'no_telp1',
            'no_telp2',
            'pin_bb',
            'hub_wa',
            'status',
            'province_id',
            'regency_id',
            'district_id',
            'village_id',
            'alamat',
            'created_at',
            'updated_at',
            'tampilkan_alamatlengkap',
            'tampilkan_notelp1',
            'tampilkan_notelp2',
            'hub_pin_bb',
            'status_ditemukan',
            'tampil_nama',
        ],
    ]) ?>

</div>
