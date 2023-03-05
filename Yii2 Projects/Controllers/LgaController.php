<?php

namespace app\controllers;

use app\models\Lga;
use app\models\PollingUnit;
use yii\web\Controller;
use yii\db\Query;

class LgaController extends Controller
{
    public function actionIndex()

    {
        $data = $this->queryData();

        return $this->printTable($data);

    }

    private function queryData()
    {
        return Lga::find()
            ->select(['uniqueid', 'lga_name'])
            ->from('lga')
            ->all();

            // return PollingUnit::find()
            // ->select(['uniqueid', 'polling_unit_name'])
            // ->from('polling_unit')
            // ->all();
    }

    private function printTable($data)
    {
        $content = '<table class="table">';
        foreach ($data as $datum) {
            $content .="<tr>";
            foreach ($datum as $key => $value){
            $content .= "<td>$value</td>";
        }
        $content .= "</tr>";
    }
        $content .= '</table>';
        return $this->renderContent($content);
    }
}


