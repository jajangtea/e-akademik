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
                border-color: black;
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

            /*awal*/
            table.mhs{
                width: 100%;
                margin-top: 15px;	
            }


            table.mhs td, table th
            {
                border: 0.5px solid #000000;
                padding-left: 20px;
                padding-right: 20px;
                padding-top: 8px;
                padding-bottom: 8px;
                text-align: center;

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
            <table class="list">
                <tr>
                    <td style="width:11%">Nomor</td>
                    <td style="width:3%">:</td>
                    <td><?php
                        foreach ($dataProviderNo as $mhsNo) {
                            echo $mhsNo['nomor_surat'];
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="width:11%">Perihal</td>
                    <td style="width:3%">:</td>
                    <td>Permohonan Penelitian</td>
                </tr>
                <tr>
                    <td style="width:11%">Lampiran</td>
                    <td style="width:3%">:</td>
                    <td>-</td>
                </tr>
            </table>
            <br/>  
            <p>
                Kepada Yth,
            </p>
            <p>
                Bapak/Ibu Pimpinan
            </p>
            <p>
                <strong><?= $perusahaan ?></strong>
            </p>
            <p>
                Di Tempat
            </p>
            <br/>
            <br/>
            <p>
                Dengan Hormat,
            </p>
            <div class="txt-tengah">
                <p>Berkenaan dengan penelitian Skripsi yang harus dilaksanakan dan ditempuh oleh seluruh Mahasiswa 
                    program studi (S-1) STT Indonesia Tanjungpinang, dengan ini kami mohon kesediaan Bapak/Ibu memberikan ijin penelitian Skripsi pada Mahasiswa kami yang akan melakukan penelitian di <strong><?=strtoupper($perusahaan)?></strong> dengan judul <strong><?=strtoupper($judul)?></strong> adapun identitas mahasiswa tersebut adalah :</p>
            </div>
            <table class="mhs">
                <tbody>
                    <tr>
                        <th >NIM</th>
                        <th >Nama</th>
                        <th>Prodi</th>
                    </tr>
                    <tr>
                        <td><?= $nim ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $namaProdi ?></td>
                    </tr>

                </tbody>



            </table>

            <div class="txt-tengah">
                <p>Demikian surat permohonan ini dibuat dengan harapan Bapak/Ibu Pimpinan dapat memenuhi permohonan tersebut.</p>
            </div>


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

