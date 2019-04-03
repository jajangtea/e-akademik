<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\simak\KrsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="krs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idkrs') ?>

    <?= $form->field($model, 'tgl_krs') ?>

    <?= $form->field($model, 'no_krs') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'idsmt') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'tasmt') ?>

    <?php // echo $form->field($model, 'sah') ?>

    <?php // echo $form->field($model, 'tgl_disahkan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
