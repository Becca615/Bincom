<?php

use app\models\PollingUnit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PollingUnitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Polling Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polling-unit-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Create Polling Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'uniqueid',
            'polling_unit_id',
            'ward_id',
            'lga_id',
            'uniquewardid',
            'polling_unit_number',
            'polling_unit_name',
            //'polling_unit_description:ntext',
            //'lat',
            //'long',
            //'entered_by_user',
            //'date_entered',
            //'user_ip_address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PollingUnit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'uniqueid' => $model->uniqueid]);
                 }
            ],
        ],
    ]); ?>

</div>
