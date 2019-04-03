<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="krs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_krs')->textInput() ?>

    <?= $form->field($model, 'no_krs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idsmt')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tasmt')->textInput() ?>

    <?= $form->field($model, 'sah')->textInput() ?>

    <?= $form->field($model, 'tgl_disahkan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
