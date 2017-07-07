<?php

namespace frontend\controllers;

class UpdateprofileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSearching($Search)
    {
        return $this->redirect(['beritas/list?BeritasSearch%5BglobalSearch%5D='.$Search]);

    }


}
