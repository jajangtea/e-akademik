<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krsmatkul */

$this->title = 'Update Krsmatkul: ' . $model->idkrsmatkul;
$this->params['breadcrumbs'][] = ['label' => 'Krsmatkuls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idkrsmatkul, 'url' => ['view', 'id' => $model->idkrsmatkul]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="krsmatkul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
