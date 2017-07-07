<?php


namespace frontend\controllers;
use frontend\models\Category;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {


	   	$query = Category::find();
	    $dataCategories = $query->orderBy('category_name ASC')->all();

	    return $this->render('index',['datacategory'=>$dataCategories]);


	    
        //return $this->render('index');

        //echo "test";
    }

}
