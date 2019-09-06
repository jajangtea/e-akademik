<?php

use app\models\simak\PrdPengajuanSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\web\View;

/* @var $this View */
/* @var $searchModel PrdPengajuanSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Surat Pengantar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-body">
    <div class="box box-default">
        <div class="box-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?=
                GridView::widget([
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY
                    ],
                    'toolbar' => [
                        '{toggleData}'
                    ],
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'NIM',
                        'nIM.Nama',
                        'jenisSidang.NamaSidang',
                        'Judul:ntext',
                        //'keterangan:ntext',
                        //'IDstatusProposal',
                        //'idPeriode',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                        ],
                    ],
                ]);
            ?>
        </div>
    </div>
</div>