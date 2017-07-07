<?php

namespace frontend\controllers;
use frontend\models\Beritas;
use frontend\models\Category;
use frontend\models\Provinces;



class BeritasListController extends \yii\web\Controller
{
    public function actionIndex()
    {



        $query = Category::find();
        $dataCategories = $query->orderBy('category_name ASC')->all();

       // $query = Beritas::find();
       // $dataBeritas = $query->orderBy('berita_id ASC')->all()->limit(20);

        
        $dataBeritas = Beritas::find()
            //->with('orders')
            ->orderBy('tanggal_kejadian ASC')
            //->limit(5)
            ->all();


        $dataProvinces = Provinces::find()
            //->with('orders')
            ->orderBy('name ASC')
            //->limit(5)
            ->all();


        return $this->render('index',[
                            'datacategory'=>$dataCategories,
                            'databerita'=>$dataBeritas,
                            'datapropinsi'=>$dataProvinces,

                        ]);

        //return $this->render('index');
    }

}
