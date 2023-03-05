<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PollingUnit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!-- <body>
<select>
    <label>Select PollingUnit</label>
    <select id="polling_unit_id" name="polling_unit_name">
        <?php foreach ($polling_unit_names as $polling_unit_name): ?>
            <option value="<?= $polling_unit_name->name ?>">
                <?= $polling_unit_id->name ?>
            </option>
        <?php endforeach; ?>
    </select>
        </body> -->
    


<div class="polling-unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'polling_unit_id')->textInput() ?>

    <?= $form->field($model, 'ward_id')->textInput() ?>

    <?= $form->field($model, 'lga_id')->textInput() ?>

    <?= $form->field($model, 'uniquewardid')->textInput() ?>

    <?= $form->field($model, 'polling_unit_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polling_unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polling_unit_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'long')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entered_by_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_entered')->textInput() ?>

    <?= $form->field($model, 'user_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
