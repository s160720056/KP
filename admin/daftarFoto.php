<?php
include 'config.php';
$conn = connectToDatabase();
$sql = "SELECT * From foto f inner join kategorifoto kf on f.idKategoriFoto = kf.idKategoriFoto";
$result = $conn->query($sql);
$isi = " 
<div class='card mb-4' style='margin-top:10%'>
    <div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Foto </h5>
            
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='harga' class='form-label'>Har   ga</label>
                <input type='text' class='form-control' id='harga' name='harga' value='".$harga."' required>
            </div>
           
            <div class='mb-3'>";
            if(isset($_GET['idEdit'])){
                    $isi.="<input type='hidden' class='form-control' id='idEdit' name='idEdit' value='$idedit' required>";
                }
                $isi.="
                <label for='nama' class='form-label'>Nama Orang Tua/Murid</label>
                <input type='text' class='form-control' id='nama' name='nama' value='' required>
                <div id='searchResults'></div>


                </div>
<div class='mb-3'>
                <div class='row'>
                    <div class='col-md-6 mb-3'>
                        <label for='bulan' class='form-label'>Bayar Bulan:</label>
                        <select class='form-select' id='bulan' name='bulan' required>";
                           $months = array(
                                   1 => 'January',
                                   2 => 'February',
                                   3 => 'March',
                                   4 => 'April',
                                   5 => 'May',
                                   6 => 'June',
                                   7 => 'July',
                                   8 => 'August',
                                   9 => 'September',
                                   10 => 'October',
                                   11 => 'November',
                                   12 => 'December'
                               );

                        $isi.="</select>
                    </div>

                   <div class='col-md-6 mb-3'>
                          <label for='tahun_ke' class='form-label'>Tahun ke-</label>
                          <select class='form-select' id='tahun_ke' name='tahun_ke' required>";
                              
                              // Get the current year and the previous 10 years
                              $currentYear = date('Y');
                              for ($i = $currentYear+2; $i >= $currentYear - 10; $i--) {
                                if($i==$currentYear && !isset($_GET['idEdit'])){
                                  $isi.="<option value='$i' selected>$i</option>";

                                  }
                                  else if(isset($_GET['idEdit']) && $i==$tahun){
                                     $isi.="<option value='$i' selected>$i</option>";
                                  }
                                  else{
                                  $isi.="<option value='$i'>$i</option>";
                                }
                              }
                    
                    $isi.="
                          </select>
                      </div>
</div>

            </div>
            <div class='mb-3'>
                <label for='keterangan' class='form-label'>Keterangan</label>
                <input type='text' class='form-control' id='keterangan' name='keterangan' value=''required>
            </div>
            <div class='mb-3'>
                <label for='tanggal' class='form-label'>Tanggal</label>
                <input type='date' class='form-control' id='tanggal' name='tanggal' value='' required>
            </div>";
            if(isset($_GET['idEdit'])){
                $isi.="<button type='submit' name='submitEdit' class='btn btn-primary'>Submit</button>";
            }
            else{
                $isi.="<button type='submit' name='add' class='btn btn-primary'>Submit</button>";

            }

            
        $isi.="</form>

        <div class='mb-3'>
      <div style='text-align: center;'>
          <label for='nothing'>////////////// PENCARIAN BULAN/TAHUN /////////////</label>
      </div>
<BR>
            <label for='bulan'>Bulan</label>
            <select class='form-select' id='bulanFilter' name='bulanFilter'>
                <option value=''>Semua Bulan</option>
                <option value='1'>Januari</option>
                <option value='2'>Ferbuari</option>
                <option value='3'>Maret</option>
                <option value='4'>April</option>
                <option value='5'>Mei</option>
                <option value='6'>Juni</option>
                <option value='7'>Juli</option>
                <option value='8'>Agustus</option>
                <option value='9'>September</option>
                <option value='10'>Oktober</option>
                <option value='11'>November</option>
                <option value='12'>Desember</option>
            </select>
        </div>

        <div class='mb-3'>
            <label for='tahunFilter'>Tahun</label>
            <select class='form-select' id='tahunFilter' name='tahunFilter'>
                <option value=''>Semua Tahun</option>
                <option value='2020'>2020</option>
                <option value='2021'>2021</option>
                <option value='2022'>2022</option>
                <option value='2023'>2023</option>
                <option value='2024'>2024</option>
                <option value='2025'>2025</option>
                <option value='2026'>2026</option>
                <option value='2027'>2027</option>
                <option value='2028'>2028</option>
                <option value='2029'>2029</option>
                <option value='2030'>2030</option>
             
            </select>
        </div>

        <button type='button' class='btn btn-primary' id='filterButton'>Cari</button>



    </div></div>
";




































































































include 'index.php';
?>