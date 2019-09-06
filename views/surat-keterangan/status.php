
<style>

    #icone_grande {
        font-size: 8rem;
        color:#fff;
    } 
    
    table td{
       text-align: left;
    }
     table th{
       text-align: right;
    }
</style>

<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
            <br><br> 
            <?php
            if ($ada == 1) {
                ?>
                <i class="fa fa-check" id="icone_grande" style="color:blue"></i>
                <h2 style = "color:#0fad00">Data Ditemukan</h2>
                <table class="table">
                    
                    <tbody>
                        <tr>
                            <th scope="row">NIM :</th>
                            <td> <?= $nim ?>   </td>
                        </tr>
                        <tr>
                            <th scope="row">Nama :</th>
                            <td> <?= $nama ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Semester :</th>
                            <td>  <?= $semester ?> </td> 
                        </tr>
                        <tr>
                            <th scope="row">Tahun  Akademik :</th>
                            <td> <?= $tahun ?></td>
                        </tr>
                    </tbody>
                </table>


            <?php } else { ?>
                <i class="fa fa-times" id="icone_grande" style="color:red"></i>
                <h2 style = "color:#F00">Data Tidak Ditemukan</h2>
            <?php } ?>
            <h3>Hubungi Akademik STT Indonesia Tanjungpinang</h3>
            
            <br><br>
        </div>

    </div>
</div>