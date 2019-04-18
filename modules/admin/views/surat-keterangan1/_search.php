<?php

use app\models\simak\KrsmatkulSearch;
use app\models\simak\Ta;
use app\models\simak\VDatamhs;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model KrsmatkulSearch */
/* @var $form ActiveForm */
?>

<div class="krsmatkul-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <div class="row">
        <div class="col-lg-6">
            <?php
            $authMhs = ArrayHelper::map(
                            VDatamhs::find()->asArray()->all(),
                            'nim', 'nama_mhs');

            echo $form->field($model, 'nim')->widget(Select2::classname(), [
                'data' => $authMhs,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Mahasiswa ...',
                ],
            ])->label('Nama Mahasiswa');
            ?>
            <?php
            $authTa = ArrayHelper::map(
                            Ta::find()->asArray()->all(),
                            'tahun', 'tahun_akademik');

            echo $form->field($model, 'tahun')->label('Tahun Akademik')->widget(Select2::classname(), [
                'data' => $authTa,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih TA ...',
                ],
            ]);
            ?>     
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
