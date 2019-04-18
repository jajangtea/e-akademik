<!DOCTYPE html>
<?php
use app\models\simak\Krsmatkul;
?>
<html>
    <head>
        <title>Surat Keterangan</title>
        <style>
            /*            .page
                        {           
                            padding:2cm;
                        }
                        table
                        {
                            border-spacing:0;
                            border-collapse: collapse; 
                            width:100%;
                        }
            
                        table td, table th
                        {
                            border: 0.5px solid #000000;
                        }
            
                        table th
                        {
                            background-color:red;
                        }*/

            *{
                margin: 0;
                padding: 0;
            }

            table
            {
                border-spacing:0;
                border-collapse: collapse; 
                border-color: #000000;
                width:100%;
                font-family: Calibri, sans-serif;
                font-size: 13px;
            }

            .container{
                padding:2.5cm;
                margin-top: 20px;
                font-family: Calibri, sans-serif;
                font-size: 13px;
            }



            .fleft{
                float: left;
            }

            .fright{
                float: right;
            }

            .fcenter{
                text-align: center;
                padding: 1px;
            }
            .fcentersize{
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }

            .txt-tengah{
                text-align: justify;
                line-height: 1.8;
            }

            .clear{
                clear: both;
            }

            h1{
                font-size: 22px;
            }



            table.list th{
                padding: 5px;
            }

            table.list td{
                padding: 5px;
                text-align: left;
            }

            table.list tr{
                /*background: #EEEEEE;*/
                /*                border: 0.5px solid #000000;*/
            }



            table.ttd{
                width: 100%;
                margin-top: 33px;	
            }

            table.ttx{
                width: 100%;

            }

            table.ttd th{
                padding: 5px;
            }

            table.ttd td{
                padding: 5px;
                text-align: center;
            }

            table.ttd tr{
                /*background: #EEEEEE;*/
            }
            p {
                font-family: Calibri, sans-serif;
                font-size: 13px;
            }
        </style>
    </head>
    <body>	
        <div class="container">	
            <table class="ttx">
                <tr>
                    <td style="width: 100%;text-align:right">
                        <img src="<?= $puket1 ?>" width="50%"/>
                    </td>
                </tr>
            </table>
            <br/>
            <table class="ttd">
                <tr>
                    <td style="width: 100%;">
                        <p class="fcentersize"><span style="text-decoration: underline;">SURAT KETERANGAN AKTIF KULIAH</span></p>
                        <p>Nomor <?php foreach ($dataProviderNo as $mhsNo){
                            echo $mhsNo['nomor_surat'];
                        }?></p>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="txt-tengah">
                <p>Puket I Bidang akademik Sekolah Tinggi Teknologi Indonesia Tanjungpinang dengan ini menerangkan :</p>
            </div>
            <table class="list">
                <?php
                foreach ($dataProvider as $mhs) {
                    ?>
                    <tr>
                        <td style="width:10%">NIM</td>
                        <td style="width:2%">:</td>
                        <td><?= $mhs['nim'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:10%">Nama</td>
                        <td style="width:2%">:</td>
                        <td><?= $mhs['nama_mhs'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:10%">Alamat</td>
                        <td style="width:2%">:</td>
                        <td><?= $mhs['alamat_rumah'] ?></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
            <?php
            foreach ($dataProvider as $mhs) {
                ?>
                <div class="txt-tengah">
                    <p>Adalah benar Mahasiswa Sekolah Tinggi Teknologi Indonesia Tanjungpinang dan tercatat masih aktif sebagai mahasiswa Program Studi <?=$mhs['nama_ps'].' '.$mhs['konsentrasi']?> pada semester <?= Krsmatkul::TampilNamaSemester($mhs['idsmt']) ?> Tahun akademik <?=$mhs['tahun_akademik']?>.</p>
                    <p>Demikian surat keterangan dibuat dengan sebenar-benarnya dan untuk digunakan sebagaimana mestinya.</p>
                </div>
                <?php
            }
            ?>
            <table class="ttd">
                <tr>
                    <td style="width: 60%;text-align: left;"><img src="<?= $qr ?>" width="100px" height="100px"/></td>
                    <td style="width: 40%;text-align: center;">
                        <p>Tanjungpinang,<?= date("d-M-Y") ?></p>
                        <p>Hormat Kami</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p><strong><span style="text-decoration: underline;">Ade Winarni,M.T</span></strong></p>
                        <p><strong>Puket I Bidang Akademik</strong></p>
                    </td>
                </tr>
            </table>
        </div>   
    </body>
</html>

