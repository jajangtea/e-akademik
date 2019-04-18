<?php

namespace app\modules\admin\controllers;

use app\models\simak\SuratKeteranganSearch;
use hscstudio\export\OpenTBS;
use Yii;
use yii\web\Controller;
use const OPENTBS_DOWNLOAD;

class SuratKeteranganController extends Controller {

    public function actionIndex() {
        Yii::$app->session['nim'] = Yii::$app->request->queryParams['SuratKeteranganSearch']['nim'];
        Yii::$app->session['tahun'] = Yii::$app->request->queryParams['SuratKeteranganSearch']['tahun'];
        $searchModel = new SuratKeteranganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionExportSuratKeterangan() {
        $sql = "SELECT * FROM v_kelas_mhs vkm 
                INNER JOIN krsmatkul km ON vkm.idkrsmatkul=km.idkrsmatkul 
                INNER JOIN krs kr ON km.idkrs=kr.idkrs
                INNER JOIN register_mahasiswa rm ON kr.nim=rm.nim
                INNER JOIN formulir_pendaftaran fp ON rm.no_formulir=fp.no_formulir
                INNER JOIN penyelenggaraan pn ON  vkm.idpenyelenggaraan=pn.idpenyelenggaraan
                INNER JOIN matakuliah mkul ON pn.kmatkul=mkul.kmatkul
                WHERE 
                vkm.idkelas='$idkelas' AND
                mkul.kmatkul ='$kmatkul' AND
                pn.tahun ='$tahun' AND
                pn.kjur LIKE '%$kjur%' AND 
                kr.idsmt  LIKE '%$idsmt%' AND
                vkm.nama_kelas='$nama_kelas' AND
                vkm.nama_dosen  LIKE '%$dosen%'";
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $OpenTBS = new OpenTBS; // new instance of TBS
        $template = Yii::getAlias('@app/modules/admin/views/krsmatkul') . '/_export.docx';

        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        $OpenTBS->LoadTemplate($template);
        $data = [];
        $no = 1;
        foreach ($cmd as $mhs) {
            $data[] = [
                'no' => $no++,
                'title' => $mhs->title,
                'description' => $mhs->description,
            ];
        }

        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_export.docx'); // Also merges all [onshow] automatic fields.
        exit;
    }

}
