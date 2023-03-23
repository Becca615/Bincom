<?php

use yii\helpers\Html;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\Lga  */
/** @var app\models\PollingUnit  */
/** @var app\models\\AnnouncedPuResults  */
/** @var app\models\AnnouncedLgaResults */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Election Results';
$this->params['breadcrumbs'][] = $this->title;
// $this->params['breadcrumbs'][] = ['label' => 'Local Governments'];
?>


<h1><?= Html::encode($this->title) ?></h1>

<?= Html::beginForm(['lga/index'], 'post') ?>
    <?= Html::label('Select an LGA:', 'lga-select') ?>
    <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken()) ?>
    <?= Html::dropDownList('lga', $selectedLga, array_merge(['' => 'All LGAs'], array_column($lgas, 'lga')), ['id' => 'lga-select', 'class' => 'form-control']) ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>

<?php if ($selectedLga): ?>
    <h2>Polling Unit Results for <?= Html::encode($selectedLga) ?></h2>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $puResults,
             'pagination' => [
                'pageSize' => 50, // set the number of rows per page
               ],
        ]),
        'columns' => [
            [
                'attribute' => 'polling_unit_uniqueid',
                'label' => 'Polling Unit',
            ],
            [
                'attribute' => 'party_abbreviation',
                'label' => 'Party name',
            ],
            [
                'attribute' => 'party_score',
                'label' => 'Total Pu Score',
            ],
            
        ],
    ]) ?>

<h2>LGA Results for <?= Html::encode($selectedLga) ?></h2>
    <?= GridView::widget([
      'dataProvider' => new \yii\data\ArrayDataProvider([
         'allModels' => $lgaResults,
    //   'allModels' => $puResults,
              'pagination' => [
                'pageSize' => 50, // set the number of rows per page
               ],
            ]),
        'columns' => [
            [
                'attribute' => 'lga_name',
                'label' => 'Local Government Area',
            ],
            // [
            //     'attribute' => 'result_id',
            //     'label' => 'Local Government id',
            // ],
            [
                'attribute' => 'party_abbreviation',
                'label' => 'Party name',
            ],
            [
                'attribute' => 'party_score',
                'label' => 'Total Lga Score',
            ],
        ],
    ]) ?>
<?php endif; ?>


