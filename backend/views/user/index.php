<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
             'status',
            // 'created_at',

             //'avatar',


           [
                'attribute' => 'avatar',
                'format' => 'html',
                'label' => 'Foto',   
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function($model){
                        $beritaDocuments = (new \yii\db\Query())
                            ->select('avatar')
                            ->from('user')
                            ->where(['id'=>$model->id])
                            ->scalar();
                       if ($beritaDocuments){
                            return Html::img($beritaDocuments,['height' => '50px']);  
                        }
                        else {
                            return Html::img(Yii::$app->request->baseUrl.'/'.'uploads/empty.jpg',['height' => '50px']);
                        }

                }
            ],

             'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
