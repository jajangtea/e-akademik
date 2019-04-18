<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krsmatkul */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="krsmatkul-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idkrs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpenyelenggaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
