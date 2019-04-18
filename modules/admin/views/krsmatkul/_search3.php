<?php

use app\models\simak\Dosen;
use app\models\simak\Krsmatkul;
use app\models\simak\KrsmatkulSearch;
use app\models\simak\Matakuliah;
use app\models\simak\Ta;
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
            $authDosen = ArrayHelper::map(
                            Dosen::find()->asArray()->all(),
                            'nama_dosen', 'nama_dosen');

            echo $form->field($model, 'nama_dosen')->widget(Select2::classname(), [
                'data' => $authDosen,
                'options' => [
                    'placeholder' => 'Pilih Dosen ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Dosen');
            ?>
            <?php
            $authItems = ArrayHelper::map(
                            Matakuliah::find()->asArray()->all(),
                            'nmatkul', 'nmatkul');

            echo $form->field($model, 'nmatkul')->widget(Select2::classname(), [
                'data' => $authItems,
                'options' => [
                    'placeholder' => 'Pilih Matakuliah ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Matakuliah');
            ?>     
        </div>
        <div class="col-lg-6">
            <?php
            $authTa = ArrayHelper::map(
                            Ta::find()->asArray()->all(),
                            'tahun', 'tahun_akademik');

            echo $form->field($model, 'tahun')->widget(Select2::classname(), [
                'data' => $authTa,
                'options' => [
                    'placeholder' => 'Pilih TA ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Tahun Akademik');
            ?>
            <?php
            echo $form->field($model, 'idsmt')->widget(Select2::classname(), [
                'data' => Krsmatkul::namaSemester(),
                'options' => [
                    'placeholder' => 'Pilih Semester ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Semester');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?= Html::submitButton('Cetak', ['name' => 'submit', 'value' => 'next', 'class' => 'btn btn-primary pull-right']) ?>
                <?php //Html::submitButton('PREVIOUS', ['name' => 'submit', 'value' => 'previous', 'class' => 'btn btn-primary pull-right']) ?>

                <?= Html::submitButton('Cari', ['name' => 'submit', 'value' => 'cari', 'class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>



</div>
