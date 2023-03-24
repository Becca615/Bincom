<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AnnouncedLgaResults $model */

$this->title = 'Update Announced Lga Results: ' . $model->result_id;
$this->params['breadcrumbs'][] = ['label' => 'Announced Lga Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->result_id, 'url' => ['view', 'result_id' => $model->result_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="announced-lga-results-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
