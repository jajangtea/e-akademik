<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\iew */
/* @var $searchModel app\models\simak\KrsmatkulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absen UTS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krsmatkul-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
    GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'toolbar' => [
            ['content' => Html::a('<i class=fa fa-print></i> Cetak', ['export-excel'], ['class' => 'btn btn-success pull-right'])],
            '{export}',
            '{toggleData}'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nim',
                'value' => 'krs.nim0.noFormulir.profilesMahasiswa.nim'
            ],
            'krs.nim0.noFormulir.nama_mhs',
            [
                'attribute' => 'tahun',
                'value' => 'penyelenggaraan.tahun',
            ],
            'penyelenggaraan.kmatkul',
            [
                'attribute' => 'nmatkul',
                'value' => 'penyelenggaraan.kmatkul0.nmatkul'
            ],
            [
                'attribute' => 'nama_dosen',
                'value' => 'penyelenggaraan.dosen.nama_dosen'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
