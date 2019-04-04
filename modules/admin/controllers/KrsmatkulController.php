<?php

namespace app\modules\admin\controllers;

use app\models\simak\Krsmatkul;
use app\models\simak\KrsmatkulSearch;
use hscstudio\export\OpenTBS;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\modules\admin\AdminController;

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
    public function actionIndex() {
        $searchModel = new KrsmatkulSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
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
//        $searchModel = new KrsmatkulSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Initalize the TBS instance

        $sql = "SELECT * FROM krsmatkul km 
                INNER JOIN krs kr ON km.idkrs=kr.idkrs
                INNER JOIN penyelenggaraan p ON km.idpenyelenggaraan=p.idpenyelenggaraan
                INNER JOIN profiles_mahasiswa pm ON kr.nim=pm.nim
                INNER JOIN formulir_pendaftaran fp ON pm.no_formulir=fp.no_formulir
                INNER JOIN matakuliah mk ON p.kmatkul=mk.kmatkul
                INNER JOIN dosen dsn ON p.iddosen=dsn.iddosen
                INNER JOIN kelas_mhs_detail kmd ON km.idkrsmatkul=kmd.idkrsmatkul
                INNER JOIN kelas_mhs kmhs ON kmd.idkelas_mhs=kmhs.idkelas_mhs
                WHERE kr.tahun=2018 
                AND kr.idsmt=3 
                AND dsn.iddosen=22
                AND p.kjur=12 
                AND kmhs.idkelas='B' 
                AND kmhs.nama_kelas=1
                ";
        $cmd = \Yii::$app->db_simak->createCommand($sql)->queryAll();
       
        $OpenTBS = new OpenTBS; // new instance of TBS
        // set template
        $template = Yii::getAlias('@app/views/krsmatkul') . '/_uts.xlsx';
        // Also merge some [onload] automatic fields (depends of the type of document).
        $OpenTBS->LoadTemplate($template);
        //$OpenTBS->VarRef['modelName']= "Category";
        $data = [];
        $no = 1;

        foreach ($cmd as $mhs) {
            $data[] = [
                'no' => $no++,
                'nim' => $mhs['nim'],
                'nama_mhs' => $mhs['nama_mhs'],
            ];
        }
//        foreach ($dataProvider->getModels() as $category) {
//            $data[] = [
//                'no' => $no++,
//                'nim' => $category->idkrs,
//                'nama_mhs' => $category->idpenyelenggaraan,
//            ];
//        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit;

        $OpenTBS->MergeBlock('data', $data);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_export.xlsx'); // Also merges all [onshow] automatic fields.
        exit;
    }

}
