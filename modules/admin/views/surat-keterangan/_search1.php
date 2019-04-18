<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeteranganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keterangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomor_surat') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'keperluan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
