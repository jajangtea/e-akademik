<?php

namespace app\modules\admin\controllers;

use app\models\simak\Krsmatkul;
use app\models\simak\VNilaiKhsSearch;
use app\modules\admin\AdminController;
use hscstudio\export\OpenTBS;
use app\models\simak\Ta;
use Yii;
use yii\data\SqlDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * KrsmatkulController implements the CRUD actions for Krsmatkul model.
 */
class KrsmatkulController extends AdminController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Krsmatkul models.
     * @return mixed
     */
    public static function getDb() {
        return Yii::$app->get('db_simak');
    }

    public function actionIndex() {
        Yii::$app->session['nama_kelas'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['nama_kelas'];
        Yii::$app->session['idkelas'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['idkelas'];
        Yii::$app->session['nama_dosen'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['nama_dosen'];
        Yii::$app->session['tahun_cetak'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['tahun'];
        Yii::$app->session['kmatkul'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['kmatkul'];
        Yii::$app->session['idsmt_cetak'] = Yii::$app->request->queryParams['VNilaiKhsSearch']['idsmt'];
        $searchModel = new VNilaiKhsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Krsmatkul model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Krsmatkul model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Krsmatkul();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idkrsmatkul]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Krsmatkul model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idkrsmatkul]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Krsmatkul model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Krsmatkul model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Krsmatkul the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Krsmatkul::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportExcel() {
        $dosen = Yii::$app->session['nama_dosen'];
        $tahun = Yii::$app->session['tahun'];
        $kmatkul = Yii::$app->session['kmatkul'];
        $idsmt = $idsmt = Yii::$app->session['idsmt'];
        $idkelas = Yii::$app->session['idkelas'];
        $nama_kelas = Yii::$app->session['nama_kelas'];
        $kjur = Yii::$app->session['kjur'];
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
        $sqlHeader = "  SELECT DISTINCT (vkm.idpenyelenggaraan),vkm.hari,vkm.jam_masuk,vkm.jam_keluar,mkul.kmatkul,mkul.nmatkul,rk.namaruang,vkm.nama_kelas,vkm.nama_dosen
                        FROM v_kelas_mhs vkm 
                        INNER JOIN krsmatkul km ON vkm.idkrsmatkul=km.idkrsmatkul 
                        INNER JOIN krs kr ON km.idkrs=kr.idkrs 
                        INNER JOIN register_mahasiswa rm ON kr.nim=rm.nim 
                        INNER JOIN formulir_pendaftaran fp ON rm.no_formulir=fp.no_formulir 
                        INNER JOIN penyelenggaraan pn ON vkm.idpenyelenggaraan=pn.idpenyelenggaraan 
                        INNER JOIN matakuliah mkul ON pn.kmatkul=mkul.kmatkul 
                        INNER JOIN ruangkelas rk ON vkm.idruangkelas=rk.idruangkelas
                        WHERE
                        vkm.idkelas='$idkelas' AND
                        mkul.kmatkul ='$kmatkul' AND
                        pn.tahun ='$tahun' AND
                        pn.kjur LIKE '%$kjur%' AND 
                        kr.idsmt  LIKE '%$idsmt%' AND
                        vkm.nama_kelas='$nama_kelas' AND
                        vkm.nama_dosen  LIKE '%$dosen%'
                        ";
        $cmdHeader = \Yii::$app->db_simak->createCommand($sqlHeader)->queryAll();


//        echo $sql;
//        exit;
        $cmd = \Yii::$app->db_simak->createCommand($sql)->queryAll();
        $OpenTBS = new OpenTBS; // new instance of TBS
        $template = Yii::getAlias('@app/modules/admin/views/krsmatkul') . '/_uts.xlsx';
        $OpenTBS->LoadTemplate($template);
        $data = [];
        $no = 1;
        $semester=Krsmatkul::TampilNamaSemester(Yii::$app->session['idsmt']);
        foreach ($cmd as $mhs) {
            $data[] = [
                'no' => $no++,
                'nim' => $mhs['nim'],
                'nama_mhs' => $mhs['nama_mhs'],
            ];
        }
    
        foreach ($cmdHeader as $header) {
            $dataHeader[] = [
                'hari' => Krsmatkul::getHari($header['hari']),
                'jam_masuk' => $header['jam_masuk'],
                'jam_keluar' => $header['jam_keluar'],
                'kmatkul' => $header['kmatkul'],
                'nmatkul' => $header['nmatkul'],
                'namaruang' => $header['namaruang'],
                'nama_kelas' => $header['nama_kelas'],
                'nama_dosen' => $header['nama_dosen'],
                'tahun'=>$this->ambilnamata(Yii::$app->session['tahun']),
                'semester'=>\strtoupper($semester),
            ];
        }
        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->MergeBlock('dataHeader', $dataHeader);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, $_GET["namadosen"].'_'.$_GET["kmatkul"].'_'.'_uts.xlsx'); // Also merges all [onshow] automatic fields.
        exit;
    }
    public function ambilnamata($ta){
        $tahun=new Ta();
        $nama=$tahun::findOne($ta);
        return $nama->tahun_akademik;

    }
}
