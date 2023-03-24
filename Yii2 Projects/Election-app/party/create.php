<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Party $model */

// $this->title = 'Create Party';
// $this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="party-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
