<?php
include_once 'header.php';
require_once('class_bmipasien.php');
session_start();
if(isset($_POST['proses'])){
    $pasien = new bmi_passien($_POST['nama'], $_POST['umur'], $_POST['jeniskelamin'], $_POST['berat'], $_POST['tinggi']);
    if(!isset($_SESSION['pasiens'])){       
        $_SESSION['pasiens'] = array();
        array_push($_SESSION['pasiens'], $pasien);
    }else{
        array_push($_SESSION['pasiens'],$pasien);
    }
    unset($_POST);      
}
?>
        <div class="row">
            <div class="col-12" style=" padding-top: 15px;"><h2>Form BMI</h2><hr/></div>           
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-5"> 
                                        
                <form method="POST" action="formbmi.php">
                    <div class="form-group row">
                        <div class="col-4" style="text-align: right; font-weight: bold;">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="col-8 input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-address-book" aria-hidden="true"></i></div>
                            </div>
                            <input class="form-control" type="text" id="nama" name="nama" value="" size="30"/>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4" style="text-align: right; font-weight: bold;">
                            <label for="berat">Berat Badan</label>
                        </div>
                        <div class="col-8 input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-anchor" aria-hidden="true"></i></div>
                            </div>
                            <input class="form-control" type="text" id="berat" name="berat" value="" size="30"/>
                            <div class="input-group-append">
                                <div class="input-group-text">Kg</div>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4" style="text-align: right; font-weight: bold;">
                            <label for="tinggi">Tinggi Badan</label>
                        </div>
                        <div class="col-8 input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-blind" aria-hidden="true"></i></div>
                            </div>
                            <input class="form-control" type="text" id="tinggi" name="tinggi" value="" size="30"/>
                            <div class="input-group-append">
                                <div class="input-group-text">cm</div>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4" style="text-align: right; font-weight: bold;">
                            <label for="umur">Umur</label>
                        </div>
                        <div class="col-8 input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-bell" aria-hidden="true"></i></div>
                            </div>
                            <input class="form-control" type="text" id="umur" name="umur" value="" size="30"/>
                            <div class="input-group-append">
                                <div class="input-group-text">Thn</div>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4" style="text-align: right; font-weight: bold;">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                        </div>
                        <div class="col-8 input-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="l" value="Laki-laki"a checked>
                                <label class="form-check-label" for="l">
                                Laki-laki&nbsp&nbsp&nbsp
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="p" value="Perempuan">
                                <label class="form-check-label" for="p">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                        </div>
                        <div class="col-8"> 
                            <input class="btn btn-primary" type="submit" value="Simpan" name="proses"/> <a href="daftarbmi.php" class="btn btn-primary" style="margin-right: 15px;">Daftar Pasien</a>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col-4">
            </div>            
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4" style="border: solid; padding:25px">
                <div class="row">
                    <div class="col-12">
                        <h4 style="text-align:center;">Hasil Evaluasi BMI</h4>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12">
                    <?php
                        if(isset($pasien)){
                            echo 'Nama : '.$pasien->nama.' ('.$pasien->jeniskelamin.')';
                            echo '<br/>Berat/Tinggi Badan : '.$pasien->berat.'Kg/'.$pasien->tinggi.'cm';
                            echo '<br/>Umur : '.$pasien->umur;
                            echo '<br/>BMI : '.number_format((float)$pasien->hasilBMI(), 2, '.', '');
                            echo '<br/>Status : '.$pasien->statusBMI();
                        }                    
                    ?>
                    </div>
                </div>               
            </div>
            <div class="col-4">
            </div>            
        </div>
        
        
<?php
include_once 'footer.php';
?>