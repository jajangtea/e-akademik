<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$asset = AppAsset::register($this);
?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?= Url::to(['site/home']) ?>" class="navbar-brand"><b>SMKN4</b>TPI</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= Url::to(['buku-tamu/create']) ?>"><i class="fa fa-book"></i> Buku Tamu</a></li>
                                <li><a href="#"><i class="fa fa-info-circle"></i> About</a></li>
                            </ul>
                        </div>
                        <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <?=
                                Yii::$app->user->isGuest ? (
                                        Html::a('Login', ['/site/login'],['class' => 'btn btn-flat'])
                                        ) : Html::a(
                                                'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-flat']
                                        )
                                ?>

                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="container">
                     <?= $content ?>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                    reserved.
                </div>
                <!-- /.container -->
            </footer>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

