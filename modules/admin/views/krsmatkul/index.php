<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\simak\KrsmatkulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absen UTS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krsmatkul-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

   

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