<?php

use app\models\simak\Dosen;
use app\models\simak\Kelas;
use app\models\simak\KrsmatkulSearch;
use app\models\simak\Matakuliah;
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
            $idkur = Yii::$app->session['idkur'];
            $authDosen = ArrayHelper::map(
                            Dosen::find()->asArray()->all(),
                            'nama_dosen', 'nama_dosen');

            echo $form->field($model, 'nama_dosen')->widget(Select2::classname(), [
                'data' => $authDosen,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Dosen ...',
                ],
            ])->label('Dosen');
            ?>
            <?php
            $authItems = ArrayHelper::map(
                            Matakuliah::find()->asArray()->where(["idkur" => "$idkur"])->all(),
                            'kmatkul', 'nmatkul');

            echo $form->field($model, 'kmatkul')->widget(Select2::classname(), [
                'data' => $authItems,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Matakuliah ...',
                ],
            ])->label('Matakuliah');
            ?>     
        </div>
        <div class="col-lg-6">
            <?php
            $authKelas = ArrayHelper::map(
                            Kelas::find()->asArray()->all(),
                            'idkelas', 'nkelas');

            echo $form->field($model, 'idkelas')->widget(Select2::classname(), [
                'data' => $authKelas,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Kelas ...',
                ],
            ])->label('Kelas');
            ?>
            <?php
            $namaKelas = ['1'=>'A','2'=>'B','3'=>'C','4'=>'D'];

            echo $form->field($model, 'nama_kelas')->widget(Select2::classname(), [
                'data' => $namaKelas,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Pilih Kelompok ...',
                ],
            ])->label('Kelompok');
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
