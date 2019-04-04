<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krsmatkul */

$this->title = 'Create Krsmatkul';
$this->params['breadcrumbs'][] = ['label' => 'Krsmatkuls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krsmatkul-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
