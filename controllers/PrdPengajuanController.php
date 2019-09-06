<?php

namespace app\controllers;

use app\models\simak\Krsmatkul;
use app\models\simak\PrdPengajuanSearch;
use app\models\skkp\PrdPengajuan;
use app\models\SuratKeterangan;
use Da\QrCode\QrCode;
use mPDF;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PrdPengjuanController implements the CRUD actions for PrdPengajuan model.
 */
class PrdPengajuanController extends Controller {

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
     * Lists all PrdPengajuan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PrdPengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PrdPengajuan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PrdPengajuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PrdPengajuan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDPengajuan]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing PrdPengajuan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDPengajuan]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PrdPengajuan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PrdPengajuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PrdPengajuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PrdPengajuan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCetak() {
        $id=$_GET["PrdPengajuan"]["IDPengajuan"];
        $perusahaan= $_GET["PrdPengajuan"]["keterangan"];
        $nimx = $_GET["PrdPengajuan"]["nim"];
        $prodi= substr($nimx, 0,2);
        $namaProdi= Krsmatkul::TampilNamaProdi($prodi);
        $id_surat = $_GET["PrdPengajuan"]["idpeng"];
        $model = new SuratKeterangan;
        Yii::$app->session['genauth'] = $model->generateQr();
        $model->nim = $nimx;
        $model->nama = $_GET["PrdPengajuan"]["nama"];
        $model->judul = $_GET["PrdPengajuan"]["judul"];
        $model->tahunsmt=$nim.''.$id.''.$id_surat;
        $model->keperluan = "Surat Pengantar";
        $genauth = Yii::$app->session['genauth'];
        $model->authqr = $genauth;
        $model->id_surat = $id_surat;
        $model->save();
        $sql = "select * from prd_pengajuan pp inner join prd_mahasiswa pm on  pp.NIM=pm.NIM
        inner join prd_pengajuan ppeng on pp.IDJenisSidang=ppeng.IDJenisSidang
        where pp.IDPengajuan='$id'";

        $qrCode = (new QrCode($genauth))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);

        $qrCode->writeFile(__DIR__ . '/qr/' . $genauth . '.png'); // writer defaults to PNG when none is specified
        header('Content-Type: ' . $qrCode->getContentType());
        $cmd = Yii::$app->db_skkp->createCommand($sql)->queryAll();
        foreach ($cmd as $data) {
            $nim = $data['NIM'];
            $nama = $data['Nama'];
            $judul = $data['Judul'];
        }

        $sqlNo = "select * from tbl_surat_keterangan 
        where nim='$nimx' and id_surat='$id_surat'";
        
        $cmdNo = Yii::$app->db_akademik->createCommand($sqlNo)->queryAll();
        $html = $this->renderPartial('_export', [
            'perusahaan' => $perusahaan,
            'nim' => $nim,
            'judul' => $judul,
            'nama' => $nama,
            'namaProdi'=>$namaProdi,
            'qr' => __DIR__ . '/qr/' . "$genauth" . '.png',
            'dataProviderNo' => $cmdNo,
            'puket1' => __DIR__ . '/puket1.jpg',
        ]);
        $mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

}
