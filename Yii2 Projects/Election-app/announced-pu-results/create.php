<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\announcedPuResults $model */

$this->title = 'Create Announced Pu Results';
$this->params['breadcrumbs'][] = ['label' => 'Announced Pu Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announced-pu-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
