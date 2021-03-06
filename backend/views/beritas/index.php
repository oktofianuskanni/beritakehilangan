<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeritasSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beritas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Beritas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'berita_id',
            //'user_id',
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            [
                'attribute'=>'category_id',
                'value'=>'category.category_name',
            ],

            //'category_id',
            'jenis_berita',
            'judul_berita',
            // 'deskripsi_berita:ntext',
            // 'tanggal_kejadian',
            // 'email:email',
            // 'hub_email:email',
            // 'no_telp1',
            // 'no_telp2',
            // 'pin_bb',
            // 'hub_wa',
             'status',
            // 'province_id',
            // 'regency_id',
            // 'district_id',
            // 'village_id',
            // 'alamat',
            // 'created_at',
             'updated_at',
            // 'tampilkan_alamatlengkap',
            // 'tampilkan_notelp1',
            // 'tampilkan_notelp2',
            // 'hub_pin_bb',
            // 'status_ditemukan',
            // 'tampil_nama',


           [
                'attribute' => 'berita_id',
                'format' => 'html',
                'label' => 'Foto',   
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function($model){
                        $beritaDocuments = (new \yii\db\Query())
                            ->select('filename')
                            ->from('documents')
                            ->where(['berita_id'=>$model->berita_id])
                            ->scalar();
                       if ($beritaDocuments){
                            return Html::img(Yii::$app->request->baseUrl.'/'.$beritaDocuments,['height' => '50px']);  
                        }
                        else {
                            return Html::img(Yii::$app->request->baseUrl.'/'.'uploads/empty.jpg',['height' => '50px']);
                        }

                }
            ],

             

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
