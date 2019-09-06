<?php

use app\models\simak\PrdPengajuanSearch;
use app\models\skkp\PrdMahasiswa;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model PrdPengajuanSearch */
/* @var $form ActiveForm */
?>

<div class="prd-pengajuan-search">

    <?php $form = ActiveForm::begin([
        'action' =>['index'],
        'method' => 'get',
    ]); ?>

   <?php
            $authMhs = ArrayHelper::map(
                            PrdMahasiswa::find()->asArray()->all(),
                            'NIM', 'Nama');

            echo $form->field($model, 'NIM')->widget(Select2::classname(), [
                'data' => $authMhs,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Mahasiswa ...',
                ],
            ])->label('Nama Mahasiswa');
            ?>
   
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
