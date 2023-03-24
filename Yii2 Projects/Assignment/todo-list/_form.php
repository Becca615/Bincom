<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TodoList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="todo-list-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


</div>
