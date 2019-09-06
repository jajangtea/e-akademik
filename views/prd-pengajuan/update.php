<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\skkp\PrdPengajuan */

$this->title = 'Update Prd Pengajuan: ' . $model->IDPengajuan;
$this->params['breadcrumbs'][] = ['label' => 'Prd Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPengajuan, 'url' => ['view', 'id' => $model->IDPengajuan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prd-pengajuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
