<?php

use app\models\simak\Krsmatkul;
use app\models\simak\ProgramStudi;
use app\models\simak\Ta;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Setting Prodi';
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>STTI</b>Tanjungpinang</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Options Prodi</p>

        <?php
        $form = ActiveForm::begin();
        ?>
  
        <?=
        $form->field($model, 'kjur')->label('Program Studi')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(ProgramStudi::find()->all(), 'kjur', function($model) {
                        return $model->nama_ps.$model->konsentrasi;
                    }),
            'theme' => Select2::THEME_BOOTSTRAP,
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih Prodi', 'required' => true, 'style' => 'width:500px', 'maxlength' => true],
        ]);
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
        <?php
        echo $form->field($model, 'idsmt')->label('Semester')->widget(Select2::classname(), [
            'data' => Krsmatkul::namaSemester(),
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Semester', 'required' => true, 'style' => 'width:500px', 'maxlength' => true],
        ]);
        ?>
        <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-cog"></i> Pilih', ['class' => 'btn btn-block btn-social btn-facebook btn-flat']) ?>
        <?= Html::submitButton('<i class="fa fa-home"></i> Kembali', ['class' => 'btn btn-block btn-social btn-google-plus btn-flat']) ?>
        </div>
<?php ActiveForm::end(); ?>
    </div>
</div><!-- /.login-box -->


