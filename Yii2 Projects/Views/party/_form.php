<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Party $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!-- <div class="party-form"> -->

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partyid')->dropDownList(
         ArrayHelper::map(app\models\Party::find()->all(), 'partyid', 'partyname'),
        ['prompt'=>'Select Party']) ?>


    <!-- <div class="form-group"> -->
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
