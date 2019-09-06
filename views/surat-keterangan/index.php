<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeteranganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keterangan Aktif Kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body">
    <div class="box box-default">
        <div class="box-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?=
                GridView::widget([
                    'panel' => [
                        'type' => GridView::TYPE_SUCCESS
                    ],
                    'toolbar' => [
                        ['content' => Html::a('<i class="glyphicon glyphicon-print"></i> Membuat Surat Keterangan', ['create'], ['class' => 'btn btn-success pull-right'])],
                        '{export}',
                        '{toggleData}'
                    ],
                    'dataProvider' => $dataProviderSuratKeterangan,
                    'filterModel' => $searchModelSuratKeterangan,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //            [
                        //                'label' => "NIM",
                        //                'attribute' => 'nim',
                        //                'value' => function($data) {
                        //                    return $data["nim"];
                        //                }
                        //            ],
                        //            [
                        //                'label' => "Nama Mahasiswa",
                        //                'attribute' => 'nama_mhs',
                        //                'value' => function($data) {
                        //                    return $data["nama_mhs"];
                        //                }
                        //            ],
                        [
                            'label' => "Kode Matakuliah",
                            'attribute' => 'kmatkul',
                            'value' => function ($data) {
                                return $data["kmatkul"];
                            }
                        ],
                        [
                            'label' => "Nama Matakuliah",
                            'attribute' => 'nmatkul',
                            'value' => function ($data) {
                                return $data["nmatkul"];
                            }
                        ],
                        //'nkelas',
                    ],
                ]);
            ?>

        </div>
    </div>
</div>