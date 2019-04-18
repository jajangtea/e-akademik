<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeterangan */

$this->title = 'Update Surat Keterangan: ' . $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keterangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_surat, 'url' => ['view', 'id' => $model->nomor_surat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-keterangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
