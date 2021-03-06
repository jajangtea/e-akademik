<?php

namespace app\controllers;

use app\models\simak\Krsmatkul;
use app\models\simak\PrdPengajuanSearch;
use app\models\SuratKeterangan;
use app\models\SuratKeteranganSearch;
use Da\QrCode\QrCode;
use hscstudio\export\OpenTBS;
use mPDF;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use const OPENTBS_DOWNLOAD;

/**
 * SuratKeteranganController implements the CRUD actions for SuratKeterangan model.
 */
class SuratKeteranganController extends Controller {

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
     * Lists all SuratKeterangan models.
     * @return mixed
     */
    public function actionIndex() {
        Yii::$app->session['nim'] = Yii::$app->request->queryParams['SuratKeteranganSearch']['nim'];
        Yii::$app->session['tahun'] = Yii::$app->request->queryParams['SuratKeteranganSearch']['tahun'];
        Yii::$app->session['idsmt'] = Yii::$app->request->queryParams['SuratKeteranganSearch']['idsmt'];
        $searchModelSuratKeterangan = new SuratKeteranganSearch();
        $dataProviderSuratKeterangan = $searchModelSuratKeterangan->search(Yii::$app->request->queryParams);


        $searchModel = new SuratKeteranganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProviderSuratKeterangan' => $dataProviderSuratKeterangan,
                    'searchModelSuratKeterangan' => $searchModelSuratKeterangan,
        ]);
    }
    
    public function actionKp() {
        $searchModel = new PrdPengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/prd-pengajuan/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratKeterangan model.
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
     * Creates a new SuratKeterangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $nim = Yii::$app->session['nim'];
        $tahun = Yii::$app->session['tahun'];
        $idsmt = Yii::$app->session['idsmt'];

        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah,ta.tahun_akademik,vkms.idsmt from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        inner join ta ta on vkms.tahun=ta.tahun
        where rm.nim='$nim' and vkms.tahun='$tahun' and vkms.idsmt='$idsmt'";
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        $model = new SuratKeterangan();
        foreach ($cmd as $mhs) {
            $model->nim = $mhs['nim'];
            $model->nama = $mhs['nama_mhs'];
            $model->tahun = $mhs['tahun_akademik'];
            $model->alamat = $mhs['alamat_rumah'];
            $model->nama_semester = Krsmatkul::TampilNamaSemester($mhs['idsmt']);
            $model->idsmt = $mhs['idsmt'];
            Yii::$app->session['genauth'] = $model->generateQr();
            $model->authqr = Yii::$app->session['genauth'];
            $model->tahunsmt = $mhs['nim'] . '' . $mhs['tahun_akademik'] . '' . $mhs['idsmt'];
            $thsmt = $mhs['nim'] . '' . $mhs['tahun_akademik'] . '' . $mhs['idsmt'];
        }

        //echo $cmdCount;
        $sqlcek = "select count(*) from tbl_surat_keterangan
        where tahunsmt='$thsmt'";
        $cmdCount = Yii::$app->db_akademik->createCommand($sqlcek)->queryScalar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->ExportPdf();
        } else if ($cmdCount >= 1) {
            Yii::$app->session->setFlash('suratsudahdibuat');
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuratKeterangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuratKeterangan model.
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
     * Finds the SuratKeterangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratKeterangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SuratKeterangan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportSurat() {
        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        where rm.nim='3217704' and vkms.tahun='2018'";
        $OpenTBS = new OpenTBS; // new instance of TBS
        $template = Yii::getAlias('@app/modules/admin/views/surat-keterangan') . '/_export.docx';
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();

        $OpenTBS->LoadTemplate($template);

        $qrCode = (new QrCode('This is my text'))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(51, 153, 255);
        $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

        header('Content-Type: ' . $qrCode->getContentType());
        //   echo $qrCode->writeString();
        //   echo '<img src"' . $qrCode->writeDataUri() . '">';

        $data = [];
        $no = 1;
        foreach ($cmd as $mhs) {
            $data[] = [
                'no' => $no++,
                'nim' => $mhs['nim'],
                'nama_mhs' => $mhs['nama_mhs'],
                'alamat_rumah' => $mhs['alamat_rumah'],
                'image' => __DIR__ . '/code.png',
            ];
        }


        $OpenTBS->SetOption('noerr', true);
        $OpenTBS->MergeBlock('myBlock', $myBlock['photos']);
        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_export.docx'); // Also merges all [onshow] automatic fields.
        exit;
    }

    public function ExportPdf() {
        $nim = Yii::$app->session['nim'];
        $tahun = Yii::$app->session['tahun'];
        $idsmt = Yii::$app->session['idsmt'];
        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah,ta.tahun_akademik,vkms.idsmt,ps.nama_ps,ps.konsentrasi from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        inner join ta ta on vkms.tahun=ta.tahun
        inner join program_studi ps on vkms.kjur=ps.kjur
        where rm.nim='$nim' and vkms.tahun='$tahun' and vkms.idsmt='$idsmt'";
        $genauth = Yii::$app->session['genauth'];
        $qrCode = (new QrCode($genauth))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);

        $qrCode->writeFile(__DIR__ . '/qr/' . $genauth.'.png'); // writer defaults to PNG when none is specified
        header('Content-Type: ' . $qrCode->getContentType());
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        foreach ($cmd as $data) {
            $nama_tahun = $data['tahun_akademik'];
        }
        $sqlNo = "select * from tbl_surat_keterangan 
        where nim='$nim' and tahun='$nama_tahun' and idsmt='$idsmt'";

        $cmdNo = Yii::$app->db_akademik->createCommand($sqlNo)->queryAll();
        $html = $this->renderPartial('_export', [
            'dataProvider' => $cmd,
            'dataProviderNo' => $cmdNo,
            'qr' => __DIR__ . '/qr/' . "$genauth" . '.png',
            'puket1' => __DIR__ . '/puket1.jpg',
        ]);
        $mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    public function actionExportPdf() {
        $genauth = Yii::$app->session['genauth'];
        $nim = Yii::$app->session['nim'];
        $tahun = Yii::$app->session['tahun'];
        $idsmt = Yii::$app->session['idsmt'];
        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah,ta.tahun_akademik,vkms.idsmt,ps.nama_ps,ps.konsentrasi from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        inner join ta ta on vkms.tahun=ta.tahun
        inner join program_studi ps on vkms.kjur=ps.kjur
        where rm.nim='$nim' and vkms.tahun='$tahun' and vkms.idsmt='$idsmt'";
        $qrCode = (new QrCode($genauth))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);
        $qrCode->writeFile(__DIR__ . '/qr/' . "$genauth" . '.png');
        header('Content-Type: ' . $qrCode->getContentType());
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        foreach ($cmd as $data) {
            $nama_tahun = $data['tahun_akademik'];
        }
        $sqlNo = "select * from tbl_surat_keterangan 
        where nim='$nim' and tahun='$nama_tahun' and idsmt='$idsmt'";

        $cmdNo = Yii::$app->db_akademik->createCommand($sqlNo)->queryAll();
        $html = $this->renderPartial('_export', [
            'dataProvider' => $cmd,
            'dataProviderNo' => $cmdNo,
            'qr' => __DIR__ . '/qr/' . "$genauth" . '.png',
            'puket1' => __DIR__ . '/puket1.jpg',
        ]);
        $mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    public function actionValidasi($qr) {
        $sql = "select count(*) from tbl_surat_keterangan where authqr=:qr";
        $sqlKet = "select * from tbl_surat_keterangan where authqr=:qr";
        $param = [':qr' => $qr];
        $validasi = Yii::$app->db_akademik->createCommand($sql, $param)->queryScalar();
        $keterangan = Yii::$app->db_akademik->createCommand($sqlKet, $param)->queryAll();


        if ($validasi >= 1) {
            foreach ($keterangan as $value) {
                $nim = $value['nim'];
                $nama = $value['nama'];
                $tahun = $value['tahun'];
                $semester = $value['idsmt'];
            }
            return $this->render('status', [
                        'ada' => 1,
                        'nim' => $nim,
                        'nama' => $nama,
                        'tahun' => $tahun,
                        'semester' => Krsmatkul::TampilNamaSemester($semester),
            ]);
        } else {
            return $this->render('status', [
                        'ada' => 0,
            ]);
        }
    }
    
    public function ExportPengantarKP() {
        $nim = Yii::$app->session['nim'];
        $tahun = Yii::$app->session['tahun'];
        $idsmt = Yii::$app->session['idsmt'];
        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah,ta.tahun_akademik,vkms.idsmt,ps.nama_ps,ps.konsentrasi from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        inner join ta ta on vkms.tahun=ta.tahun
        inner join program_studi ps on vkms.kjur=ps.kjur
        where rm.nim='$nim' and vkms.tahun='$tahun' and vkms.idsmt='$idsmt'";
        $genauth = Yii::$app->session['genauth'];
        $qrCode = (new QrCode($genauth))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);

        $qrCode->writeFile(__DIR__ . '/qr/' . $genauth.'.png'); // writer defaults to PNG when none is specified
        header('Content-Type: ' . $qrCode->getContentType());
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        foreach ($cmd as $data) {
            $nama_tahun = $data['tahun_akademik'];
        }
        $sqlNo = "select * from tbl_surat_keterangan 
        where nim='$nim' and tahun='$nama_tahun' and idsmt='$idsmt'";

        $cmdNo = Yii::$app->db_akademik->createCommand($sqlNo)->queryAll();
        $html = $this->renderPartial('_export', [
            'dataProvider' => $cmd,
            'dataProviderNo' => $cmdNo,
            'qr' => __DIR__ . '/qr/' . "$genauth" . '.png',
            'puket1' => __DIR__ . '/puket1.jpg',
        ]);
        $mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }
    
    public function ExportPengantarSkripsi() {
        $nim = Yii::$app->session['nim'];
        $tahun = Yii::$app->session['tahun'];
        $idsmt = Yii::$app->session['idsmt'];
        $sql = "select distinct vkms.nim,fm.nama_mhs,fm.alamat_rumah,ta.tahun_akademik,vkms.idsmt,ps.nama_ps,ps.konsentrasi from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        inner join ta ta on vkms.tahun=ta.tahun
        inner join program_studi ps on vkms.kjur=ps.kjur
        where rm.nim='$nim' and vkms.tahun='$tahun' and vkms.idsmt='$idsmt'";
        $genauth = Yii::$app->session['genauth'];
        $qrCode = (new QrCode($genauth))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);

        $qrCode->writeFile(__DIR__ . '/qr/' . $genauth.'.png'); // writer defaults to PNG when none is specified
        header('Content-Type: ' . $qrCode->getContentType());
        $cmd = Yii::$app->db_simak->createCommand($sql)->queryAll();
        foreach ($cmd as $data) {
            $nama_tahun = $data['tahun_akademik'];
        }
        $sqlNo = "select * from tbl_surat_keterangan 
        where nim='$nim' and tahun='$nama_tahun' and idsmt='$idsmt'";

        $cmdNo = Yii::$app->db_akademik->createCommand($sqlNo)->queryAll();
        $html = $this->renderPartial('_export', [
            'dataProvider' => $cmd,
            'dataProviderNo' => $cmdNo,
            'qr' => __DIR__ . '/qr/' . "$genauth" . '.png',
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
