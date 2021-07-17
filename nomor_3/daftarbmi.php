<?php
include_once 'header.php';
require_once('class_bmipasien.php');
session_start();
if(isset($_POST['reset'])){
    session_destroy();
}
?>
        <div class="row">
            <div class="col-12" style=" padding-top: 15px;"><h2>Form Nilai Siswa</h2><hr/></div>           
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Tinggi Badan</th>  
                            <th scope="col">BMI</th>
                            <th scope="col">Hasil</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_SESSION['pasiens'])&&!isset($_POST['reset'])){                           
                                $nomor = 1;
                                foreach($_SESSION['pasiens'] as $pasien){
                                    echo '<tr><td>'.$nomor.'</td>';
                                    echo '<td>'.$pasien->nama.'</td>';
                                    echo '<td>'.$pasien->jeniskelamin.'</td>';
                                    echo '<td>'.$pasien->umur.'</td>';
                                    echo '<td>'.$pasien->berat.'</td>';
                                    echo '<td>'.$pasien->tinggi.'</td>';
                                    echo '<td>'.number_format((float)$pasien->hasilBMI(), 2, '.', '').'</td>';
                                    echo '<td>'.$pasien->statusBMI().'</td>';                              
                                    echo '</tr>';
                                    $nomor++;
                                }
                            }
                        ?>
                    </tbody>
                </table>    
                <form method="POST" action="daftarbmi.php">
                    <div class="form-group">
                        <a href="formbmi.php" class="btn btn-primary" style="margin-right: 15px;">Form Pasien BMI</a> <input class="btn btn-danger" type="submit" value="RESET" name="reset"/>
                    </div>
                </form>
            </div>
        </div>
        
<?php
include_once 'footer.php';
?>