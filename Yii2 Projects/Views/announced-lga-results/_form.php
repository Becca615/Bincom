<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AnnouncedLgaResults $model */
/** @var app\models\PollingUnit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="announced-lga-results-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lga_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polling_unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'party_abbreviation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'party_score')->textInput() ?>

    <!-- <?= $form->field($model, 'entered_by_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_entered')->textInput() ?>

    <?= $form->field($model, 'user_ip_address')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
