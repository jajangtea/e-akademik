<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\skkp\PrdPengajuan */

$this->title = 'Surat Pengantar';
$this->params['breadcrumbs'][] = ['label' => 'Prd Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prd-pengajuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
