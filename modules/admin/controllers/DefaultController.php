<?php

namespace app\modules\admin\controllers;

use app\models\simak\SetProdi;
use app\modules\admin\AdminController;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdminController {

    /**
     * Renders the index view for the module
     * @return string
     *    public $kjur;
    public $tahun;
    public $idsmt;
     */
    public function actionIndex() {
       
        return $this->render('index');
    }

}
