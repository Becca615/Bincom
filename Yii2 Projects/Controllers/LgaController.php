<?php

namespace app\controllers;

use Yii;
use yii\web\Request;
use app\models\Lga;
use app\models\AnnouncedPuResultsSearch ;
use app\models\AnnounceLgaResultsSearch;
use app\models\AnnouncedPuResults;
use app\models\AnnouncedLgaResults;
use app\models\PollingUnit;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\db\Query;
use yii\filters\VerbFilter;
use app\controllers\NotFoundHttpException;
use yii\data\ActiveDataProvider;


class LgaController extends Controller
{

      /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()

    {
    //   Query all LGAs
    $lgas = (new Query)
    ->select(['lga_name AS lga'])
    ->from('lga')
    ->orderBy('lga_name')
    ->all();

    // $lgas = AnnouncedLgaResults::find()->all();
    $selectedLga = Yii::$app->request->post('lga');
    $puResults = Yii::$app->request->post('announced_pu_results');
    $lgaResults = Yii::$app->request->post('announced_lga_results');


    // Retrieve the PU results for the selected LGA
   if ($selectedLga) {
     // validate input
     $validator = new \yii\validators\RequiredValidator();

     $validator->validate($selectedLga);
    //ouput
        $puResults = AnnouncedPuResults::find()
            ->where(['polling_unit_uniqueid' => $selectedLga])
            ->orderBy('party_score DESC')
            // ->orderBy('polling_unit_uniqueid')
            ->all();
        // Retrieve the LGA results for the selected LGA
        $lgaResults = AnnouncedLgaResults::find()
        ->where(['result_id' => $selectedLga])
        ->orderBy('party_score DESC')
            ->all();

            // var_dump($puResults);
            // var_dump($lgaResults);
//    }
}

    // Query the database 
    $query = new Query;
    // $query = $model->find()
    $query->select(['pu.polling_unit_name AS name', 'apu.party_score AS party_score', 'lg.lga_name AS lga', 'SUM(apu.party_score) AS Total'])
    ->from('announced_pu_results')
    ->innerJoin('polling_unit pu', 'pu.uniqueid=apu.polling_unit_uniqueid')
    ->innerJoin('lga lg', 'pu.lga_id=lg.uniqueid')
    ->innerJoin('announced_lga_results alr', 'alr.lga_name = lg.lga_name')
    ->where(['not', ['apu.party_score' => null]])
    ->groupBy('lg.uniqueid')
    ->limit(50);

    
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 50 // number of rows per page
        ],
    ]);

    // Render the view
    return $this->render('index', [
        // 'rows' => $rows,
        'dataProvider' => $dataProvider,
        'lgas' => $lgas,
        'selectedLga' => $selectedLga,
        'puResults' => $puResults ?? [],
        'lgaResults' => $lgaResults ?? [],
    ]);
    

}








        
        // $data = $this->queryData();

        // return $this->printTable($data);
      
    

//     private function queryData()
//     {
//         return Lga::find()
//             ->select(['uniqueid', 'lga_name'])
//             ->from('lga')
//             // ->innerJoin('polling_unit')
//             ->all();

//             // return PollingUnit::find()
//             // ->select(['uniqueid', 'polling_unit_name'])
//             // ->from('polling_unit')
//             // ->all();


    
    // private function printTable($data)
    // {
    //     $content = '<table class="table">';
    //     foreach ($data as $datum) {
    //         $content .="<tr>";
    //         foreach ($datum as $key => $value){
    //         $content .= "<td>$value</td>";
    //     }
    //     $content .= "</tr>";
    // }
    //     $content .= '</table>';
    //     return $this->renderContent($content);
    // }

//     public function actionView($uniqueid)
//     {
//         return $this->render('view', [
//             'model' => $this->findModel($uniqueid),
//         ]);
//     }



// protected function findModel($id)
// {
//     if (($model = AnnouncedLgaResults::findOne(['id' => $id])) !== null) {
//         return $model;
//     }

//     throw new NotFoundHttpException('The requested page does not exist.');
}