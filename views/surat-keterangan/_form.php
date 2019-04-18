<?php

use app\models\SuratKeterangan;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model SuratKeterangan */
/* @var $form ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        
        <div class="row">
            <div class="col-lg-6">
                <?php $form->field($model, 'nomor_surat')->textInput(['maxlength' => true,'readonly' => true]) ?>
                <?= $form->field($model, 'nim')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'readonly' => true]) ?>
                <?= $form->field($model, 'tahun')->textInput(['maxlength' => true,'readonly' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'alamat')->textInput(['maxlength' => true,'readonly' => true]) ?>
                <?= $form->field($model, 'nama_semester')->textInput(['maxlength' => true,'readonly' => true])->label('Semester') ?>
                <?php
                $keperluan = ['Mengurus BPJS'=>'Mengurus BPJS','Permohonan Beasiswa'=>'Permohonan Beasiswa','Permohonan Izin Belajar'=>'Permohonan Izin Belajar','Mencari Kerja'=>'Mencari Kerja','Lainnya'=>'Lainnya'];
                echo $form->field($model, 'keperluan')->label('Keperluan')->widget(Select2::classname(), [
                    'data' => $keperluan,
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => [
                        'placeholder' => 'Pilih Keperluan ...',
                    ],
                ]);
                ?>    

            </div>
            <div class="col-lg-6">

                <?= Html::submitButton('Cetak', ['class' => 'btn btn-success']) ?>
                <?= Html::resetButton('Batal', ['class' => 'btn btn-danger']) ?>
            </div>




        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
