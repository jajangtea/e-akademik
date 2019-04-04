<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\simak\KrsmatkulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Krsmatkuls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krsmatkul-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Krsmatkul', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'penyelenggaraan.tahun',
            'penyelenggaraan.kmatkul',
            'penyelenggaraan.kmatkul0.nmatkul',
            'penyelenggaraan.dosen.nama_dosen',
            'krs.nim',
             'krs.nim0.noFormulir.nama_mhs',
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
