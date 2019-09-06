<?php

use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

/* @var $this View */
/* @var $content string */
?>

<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="<?= Url::to(['site/index']) ?>" class="navbar-brand"><b>e-akademik</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <?=
                            Yii::$app->user->isGuest ? (Html::a('<i class="fa fa-lock"></i> Login', ['/admin'], ['class' => 'btn btn-flat'])) : Html::a(
                                '<i class="fa fa-unlock"></i> Sign out',
                                ['/site/logout'],
                                ['data-method' => 'post', 'class' => 'btn btn-flat']

                            )
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>