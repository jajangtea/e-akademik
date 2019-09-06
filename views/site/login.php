<?php
/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

use app\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-6 control-label'],
    ],
]);
?>
<div class="login-box">
    <!--    <div class="login-logo">
           SMKN 4 TANJUNGPINANG
           <small>Sistem Informasi Piket</small>
        </div>-->
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">e-akademik<br /><b>STT Indonesia</b></p>
        <?=
            $form->field($model, 'username', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-arrows"></i></span>{input}</div>'
            ])->textInput()->input('username', ['placeholder' => 'Masukan Username'])->label(false);
        ?>
        <?=
            $form->field($model, 'password', [
                'inputOptions' => ['placeholder' => 'Masukan Password'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span>{input}</div>',
            ])->passwordInput()->label(false);
        ?>
        <div class="social-auth-links text-center">
            <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-facebook btn-flat text-center']) ?>
            <a href="<?= Url::to(['site/index']) ?>" class="btn btn-block btn-google btn-flat text-center">Home</a>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>