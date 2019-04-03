<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\simak\KrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Krs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Krs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idkrs',
            'tgl_krs',
            'no_krs',
            'nim',
            'idsmt',
            //'tahun',
            //'tasmt',
            //'sah',
            //'tgl_disahkan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
