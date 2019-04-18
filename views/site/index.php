<?php

use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

$this->title = 'e-akademik';
?>
<style>
    .texto_grande {
        font-size: 2.5rem;
        color: white;
    } 
    #icone_grande {
        font-size: 8rem;
        color:#fff;
    } 
</style>

<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang!</h1>

        <p class="lead">e-akademik merupakan pelayanan akademik secara online pada kampus STT Indonesia Tanjungpinang</p>
    </div>
</div>




<div class="container">
    <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-success" href="<?= Url::to('surat-keterangan/') ?>">
            <i class="fa fa-envelope" id="icone_grande"></i> <br><br>
            <span class="texto_grande">Surat Aktif Kuliah</span></a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-danger" data-toggle="modal" data-target="#mymodal">
            <i class="fa fa-envelope" id="icone_grande"></i> <br><br>
            <span class="texto_grande">Pengantar KP</span></a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-primary" data-toggle="modal" data-target="#mymodal">
            <i class="fa fa-envelope" id="icone_grande"></i> <br><br>
            <span class="texto_grande"> Pengantar Skripsi</span></a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-warning" href="<?= Url::to('site/about') ?>">
            <i class="fa fa-cog fa-spin" id="icone_grande"></i> <br><br>
            <span class="texto_grande"> Informasi</span></a>
    </div> 
</div>
<?php
$js = <<<JS
new Vue({
    data:{},
    methods: {}
})
JS;

$this->registerJs($js, View::POS_END);
?>

<style>
    .header{

    }
</style>
<!-- before script -->
<script>
    new Vue({
        data: {},
        methods: {},
        mounted: {}
    })
</script>
<!-- after script -->