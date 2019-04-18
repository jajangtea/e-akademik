<?php

namespace app\modules\admin\controllers;

use app\models\simak\SetProdi;
use app\modules\admin\AdminController;
use Yii;

class SetprodiController extends AdminController {

    public function actionIndex() {
        $model = new SetProdi();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session['tahun'] = $model->tahun;
            Yii::$app->session['kjur'] = $model->kjur;
            Yii::$app->session['idsmt'] = $model->idsmt;
            Yii::$app->session->setFlash('pindahprodi');
            return $this->refresh();
        }
        $this->view->params['model'] = $model;
        return $this->render('index', ['model' => $model]);
    }

}
