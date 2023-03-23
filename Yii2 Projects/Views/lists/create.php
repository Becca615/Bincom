<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lists $model */

$this->title = 'Add Friends';
$this->params['breadcrumbs'][] = ['label' => 'Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
