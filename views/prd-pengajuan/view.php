<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\skkp\PrdPengajuan */

$this->title = $model->IDPengajuan;
$this->params['breadcrumbs'][] = ['label' => 'Prd Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prd-pengajuan-view">
<?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jenisSidang.NamaSidang',
            'NIM',
            'nIM.Nama',
            'Judul:ntext',
            'statusProposal.nstatusProposal',
        ],
    ])
?>
<?php 
    $form = ActiveForm::begin([
        'action' =>['cetak'],
        'method' => 'get',
    ]); 
?>
<?=$form->field($model, 'IDPengajuan')->hiddenInput(['readonly' => true,'value' => $_GET["id"]])->label(false);?>
<?=$form->field($model, 'nim')->hiddenInput(['readonly' => true,'value' => $model->NIM])->label(false);?>
<?=$form->field($model, 'judul')->hiddenInput(['readonly' => true,'value' => $model->Judul])->label(false);?>
<?=$form->field($model, 'nama')->hiddenInput(['readonly' => true,'value' => $model->nIM->Nama])->label(false);?>
<?=$form->field($model, 'idpeng')->hiddenInput(['readonly' => true,'value' => $model->IDJenisSidang])->label(false);?>
<?=$form->field($model, 'keterangan')->textInput()->label("Nama Perusahaan :");?>
<div class="form-group">
    <?= Html::submitButton('Cetak', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
