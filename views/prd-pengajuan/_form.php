<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\skkp\PrdPengajuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prd-pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDJenisSidang')->textInput() ?>

    <?= $form->field($model, 'NIM')->textInput() ?>

    <?= $form->field($model, 'TanggalDaftar')->textInput() ?>

    <?= $form->field($model, 'Judul')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IDstatusProposal')->textInput() ?>

    <?= $form->field($model, 'idPeriode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
