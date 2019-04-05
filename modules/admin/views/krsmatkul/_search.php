<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\simak\KrsmatkulSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="krsmatkul-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'nama_dosen') ?>
      <?= $form->field($model, 'nmatkul') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cetak',['export-excel'], ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
     <?php $form = ActiveForm::begin([
        'action' => ['export-excel'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'nama_dosen') ?>
      <?= $form->field($model, 'nmatkul') ?>

    <div class="form-group">
        <?= Html::submitButton('Cetak', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
