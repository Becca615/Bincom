<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AnnouncedLgaResults $model */

$this->title = 'Create Announced Lga Results';
$this->params['breadcrumbs'][] = ['label' => 'Announced Lga Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announced-lga-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
