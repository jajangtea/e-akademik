<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeterangan */

$this->title = 'Cetak Surat Keterangan';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keterangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keterangan-create">
    <?php if (Yii::$app->session->hasFlash('suratsudahdibuat')): ?>
        <div class="alert alert-warning">
            Surat Sudah dibuat. <a href="<?= yii\helpers\Url::to('export-pdf') ?>">Cetak Lagi!</a>
        </div>
    <?php endif; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
