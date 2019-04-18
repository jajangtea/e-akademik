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
            ['content' => Html::a('<i class="glyphicon glyphicon-print"></i> Cetak', ['export-excel'], ['class' => 'btn btn-success pull-right'])],
            '{export}',
            '{toggleData}'
        ],
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => "NIM",
                'attribute' => 'nim',
                'value' => function($data) {
                    return $data["nim"];
                }
            ],
            [
                'label' => "Nama Mahasiswa",
                'attribute' => 'nama_mhs',
                'value' => function($data) {
                    return $data["nama_mhs"];
                }
            ],
        //'nkelas',
        //'nmatkul',
        ],
    ]);
    ?>

</div>
