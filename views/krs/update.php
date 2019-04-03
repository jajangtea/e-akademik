<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krs */

$this->title = 'Update Krs: ' . $model->idkrs;
$this->params['breadcrumbs'][] = ['label' => 'Krs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idkrs, 'url' => ['view', 'id' => $model->idkrs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="krs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
