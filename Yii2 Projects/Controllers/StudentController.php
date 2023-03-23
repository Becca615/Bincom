<?php

namespace app\controllers;

use app\models\Student;
use yii\db\Query;
use  yii\web\Controller;
use yii\db\Request;
use app\controllers\NotFoundHttpException;

class StudentController extends Controller
{
    public function actionIndex($id)
    {
            $model = Student::findOne($id);

            // if (!$model) {
            //     throw new NotFoundHttpException('The requested page does not exist.');
            // }
            $firstname = $model->firstname;
            $lastname = $model->lastname;


            return $this->render('index', [
                'model' => $model,
                'id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
               
            ]);



      
      
    }

}

