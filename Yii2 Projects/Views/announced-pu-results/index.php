<?php

use app\models\announcedPuResults;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AnnouncePuResultsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Announced Pu Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announced-pu-results-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Announced Pu Results', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'result_id',
            'polling_unit_uniqueid',
            'party_abbreviation',
            'party_score',
            'entered_by_user',
            //'date_entered',
            //'user_ip_address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, announcedPuResults $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'result_id' => $model->result_id]);
                 }
            ],
        ],
    ]); ?>


</div>
