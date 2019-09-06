<?php

namespace app\controllers;

use \yii\helpers\Url;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .box {
        border-top: 1px;
    }
</style>
<div class="box box-default">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="http://sttindonesia.ac.id"><img src="http://sttindonesia.ac.id/images/Logo/stti.png" style="width:15%" class=" rounded mx-auto d-block" alt="stti_image"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="box box-default">
            <div class="box-body">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><i class="fa fa-home"></i></h3>
                            <p>Surat Keterangan Aktif Kuliah</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= Url::to(['/surat-keterangan']) ?>" class="small-box-footer">Kunjungi <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><i class="fa fa-television"></i></h3>
                            <p>Surat Pengantar KP dan Skripsi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= Url::to(['/prd-pengajuan']) ?>" class="small-box-footer">Kunjungi <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><i class="fa fa-graduation-cap"></i></h3>
                            <p>SKKP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="http://skkp.sttindonesia.ac.id" class="small-box-footer">Kunjungi <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><i class="fa fa-internet-explorer"></i></h3>
                            <p>SIMAK</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="http://www.simak.sttindonesia.ac.id" class="small-box-footer">Kunjungi <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="callout callout-info">
            <h4>Tip!</h4>
            <p>Digunakan untuk membuat surat keterangan aktif kuliah,
                jika ada perbedaan identitas silahkan perbaiki di akun <strong><a href="http://simak.sttindonesia.ac.id">SIMAK</a></strong> milik anda silahkan isi data yang diminta kemudian print kemudian verifikasi akan dilakukan dibagian akademik sekalian di tandatangan dan cap. </p> silahkan isi data yang diminta kemudian print kemudian verifikasi akan dilakukan dibagian akademik sekalian di tandatangan dan cap. </p>
        </div>
        <div class="callout callout-success">
            <h4>Tip!</h4>
            <p>Digunakan untuk membuat surat pengantar Kerja Praktek dan Skripsi,
                jika ada perbedaan identitas atau judul silahkan perbaiki di akun <strong><a href="http://skkp.sttindonesia.ac.id">SKKP</a></strong> milik anda silahkan isi data yang diminta kemudian print kemudian verifikasi akan dilakukan dibagian akademik sekalian di tandatangan dan cap. </p>
        </div>
        <div class="callout callout-warning">
            <h4>Tip!</h4>
            <p>Adalah Sistem Informasi KP dan Skripsi (SKKP)</p>
        </div>
        <div class="callout callout-danger">
            <h4>Tip!</h4>
            <p>Adalah Sistem Informasi Akademik (SIMAK)</p>
        </div>
    </div>
</div>