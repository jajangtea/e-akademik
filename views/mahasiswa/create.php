<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\simak\Krs */

$this->title = 'Create Krs';
$this->params['breadcrumbs'][] = ['label' => 'Krs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
