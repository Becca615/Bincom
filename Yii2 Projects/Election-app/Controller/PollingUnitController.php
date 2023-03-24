<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use app\models\AnnouncedPuResults;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


class PollingUnitController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


public function actionIndex()
{ 
        // Retrieve list of LGAs
                        $lgas = (new Query)
                            ->select(['lga_name AS lga'])
                            ->from('lga')
                            ->orderBy('lga_name')
                            ->all();

                            // var_dump($lgas);

     // Retrieve selected LGA and polling unit (if any)
            $selectedLga = Yii::$app->request->post('lga');
            $selectedPu = Yii::$app->request->post('polling_unit');
            //   var_dump($selectedLga);
            //     var_dump($selectedPu);

             // Retrieve list of polling units and their associated LGAs
             $pus = (new Query)
             ->select(['polling_unit_name AS name'])
             ->from('polling_unit')
             ->where(['polling_unit_id' => $selectedLga])
             ->orderBy('polling_unit_name')
             ->all();

            //  var_dump($pus);

           
            $puResults = AnnouncedPuResults::find()
                                ->where(['polling_unit_uniqueid' => $selectedLga])
                                ->orderBy('party_score DESC')
                                ->all();

                                // var_dump($puResults);
    
             // Build query to retrieve party scores
        $query = new Query();
        // $query->select([
        //     'lg.lga_name AS lga',
        //     'pu.polling_unit_name AS name',
        //     'SUM(apu.party_score) AS Total',
        // ]);
        $query->from('announced_pu_results apu')
            ->innerJoin('polling_unit pu', 'pu.uniqueid = apu.polling_unit_uniqueid')
            ->innerJoin('lga lg', 'pu.lga_id = lg.uniqueid')
            ->where(['not', ['apu.party_score' => null]]);
        $query->groupBy('pu.polling_unit_id')
            ->limit(100);


                    $dataProvider = new ActiveDataProvider([
                            'query' => $query,
                            'pagination' => [
                                'pageSize' => 50,
                            ],
                        ]);

                         // Render index file and pass relevant data to view
                        return $this->render('index', [
                            'lgas' => $lgas,
                            'pus' => $pus,
                            'selectedLga' => $selectedLga,
                            'selectedPu' => $selectedPu,
                            'dataProvider' => $dataProvider,
                            'puResults' => $puResults ?? [],
                            // 'party_score' => $party_score ?? [],
                         
                        ]);
                        
                    }
                }
         

          