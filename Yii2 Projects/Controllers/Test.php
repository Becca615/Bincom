<?php

// namespace app\controllers;

class TestController extends yii\web\Controller
{
    public function actionIndex()
    {

       $firstname = 'Damilola';
       $lastname = 'Akinrinmade';

       return $this->render('index', [
              'firstname' => $firstname,
              'lastname' => $lastname,
       ]);
    }
}

