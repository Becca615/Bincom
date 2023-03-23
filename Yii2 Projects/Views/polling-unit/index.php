<?php

use yii\grid\GridView;
use yii\helpers\Html;



/** @var yii\web\View $this */
/** @var yii\grid\GridView $this */
/** @var app\models\Lga  */
/** @var app\models\PollingUnit  */
/** @var app\models\\AnnouncedPuResults  */
/** @var app\models\AnnouncedLgaResults */
// /** @var yii\helpers\Html$this */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Polling Units Result';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="result-index">

<h1><?= Html::encode($this->title) ?></h1>


<?= Html::beginForm(['polling-unit/index'], 'post') ?>
    <?= Html::label('Select a Local Government:', 'lga-select') ?>
    <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken()) ?>
    <?= Html::dropDownList('lga', $selectedLga, array_merge(['' => 'All LGAs'], array_column($lgas, 'lga')), ['id' => 'lga-select', 'class' => 'form-control']) ?>
    <?= Html::label('Select a Polling Unit:', 'pu-select') ?>
    <!-- </?= Html::dropDownList('pu', $selectedPu, $pus, ['id' => 'pu-select', 'class' => 'form-control']) ?>   -->
    <?= Html::dropDownList('polling_unit', $selectedPu, array_merge(['' => 'All PUs'], array_column($pus, 'name')), ['id' => 'pu-select', 'class' => 'form-control']) ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    <?= Html::endForm() ?>

    <br>
     
       <?php if ($puResults): ?>
        <!-- <h3>Party Scores for Polling Unit: </?= Html::encode($selectedLga) ?></h3> -->
         <table class="table table-bordered"> 
            <thead>
                <tr>
                    <th>Party Name</th>
                    <th>Party Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($puResults as $result): ?>
                    <tr>
                        <td><?= Html::encode($result->party_abbreviation) ?></td>
                        <td><?= Html::encode($result->party_score) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>  
    <br>
       
     <!-- </?= GridView::widget([
        //  'dataProvider' => $dataProvider,
        'dataProvider' => new ArrayDataProvider([
            'allModels' => ([
                $puResults,
            ]),
             'pagination' => [
                'pageSize' => 100, // set the number of rows per page
               ],
        ]),
                
         'columns' => [
          
            [
                // 'attribute' => 'lga_name',
                'attribute' => 'lga',
                 'label' => 'Local Government Area',
                 'value' => function ($model) use ($selectedLga) {
                    return $selectedLga;
                 },
            ],
            [
                'attribute' => 'polling_unit_name',
                 'label' => 'Polling Unit',
                 'value' => function ($model) use ($selectedPu) {
                    return $selectedPu;
                },
            ],
            // 'party_abbreviation',
            // 'party_score',  
        ], 
        
     ]);  ?> -->

<!-- </?php var_dump($puResults); ?> -->

   

</div> 


