<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Party $model */

$this->title = 'Update Party: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="party-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
