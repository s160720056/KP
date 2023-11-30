<?php

include 'config.php';
$conn = connectToDatabase(); 
$tanggalBooking=$id="";
$durasiBooking=1;


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if(isset($_POST['add'])){
//     // Handle form submission, process the form data and insert into the database
//     // Example:
//     $tanggalBooking = isset($_POST['tanggalBooking']) ? $_POST['tanggalBooking'] : "";
//     $namaPanggilan = isset($_POST['namaPanggilan']) ? $_POST['namaPanggilan'] : "";
//     $tempat = isset($_POST['tempat']) ? $_POST['tempat'] : "";
//     $tglLahir = isset($_POST['tglLahir']) ? $_POST['tglLahir'] : "";
//     $converted_date = date('Y-m-d', strtotime($tglLahir));
//     $jenisKelamin = isset($_POST['jenisKelamin']) ? $_POST['jenisKelamin'] : "";
//     $sekolah = isset($_POST['sekolah']) ? $_POST['sekolah'] : "";
//     $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : "";
//     $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
//     $namaAyah = isset($_POST['namaAyah']) ? $_POST['namaAyah'] : "";
//     $namaIbu = isset($_POST['namaIbu']) ? $_POST['namaIbu'] : "";
//     $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";
//     $tb = isset($_POST['tb']) ? $_POST['tb'] : "";
//     $bb = isset($_POST['bb']) ? $_POST['bb'] : "";
//     $golonganDarah= isset($_POST['golonganDarah']) ? $_POST['golonganDarah'] : "";
//     $noHPAyah1 = $_POST['noHPAyah1'];
//     $noHPAyah2 = $_POST['noHPAyah2'];
//     $noHPAyah3 = $_POST['noHPAyah3'];
//     $noHPIbu1 = $_POST['noHPIbu1'];
//     $noHPIbu2 = $_POST['noHPIbu2'];
//     $noHPIbu3 = $_POST['noHPIbu3'];
//     $alergi=$_POST['alergi'];
//     $keterangan = $_POST['keterangan'];
//     $idKelompok=isset($_POST['idKelompok']) ? $_POST['idKelompok'] : "";
    
//     $sql="INSERT INTO `Booking`( `tanggalBooking`, `namaPanggilan`, `Tempat`, `tanggalLahir`, `jenisKelamin`, `sekolah`, `kelas`, `alamat`, `namaAyah`, `namaIbu`, `Instagram`, `TB(cm)`, `BB(kg)`, `Gol.Darah`, `Alergi`, `idKeterangan`,`idKelompok`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//         $hasil = $conn->prepare($sql);
// $hasil->bind_param("ssssssissssssssii", $tanggalBooking, $namaPanggilan, $tempat, $converted_date, $jenisKelamin, $sekolah, $kelas, $alamat, $namaAyah, $namaIbu, $instagram, $tb, $bb, $golonganDarah, $alergi, $keterangan,$idKelompok);
//     $hasil->execute();

//     $sql="SELECT * from Booking where tanggalBooking='$tanggalBooking'";
//     $result = $conn->query($sql);
//     $id=0;
//     while ($row = $result->fetch_assoc()) {
//         $id=$row['idBooking'];
//     }
    
// $listnoHPAyah=[$noHPAyah1,$noHPAyah2,$noHPAyah3];
// $listnoHPIbu=[$noHPIbu1,$noHPIbu2,$noHPIbu3];
//     for ($i = 0; $i < 3; $i++) {
        
//         if ($listnoHPAyah[$i] != "") {
//             $sql = "INSERT INTO `ayah` (`idBooking`, `namaAyah`, `noHPA`) VALUES (?, ?, ?)";
//             $hasil = $conn->prepare($sql);
//             $hasil->bind_param("iss", $id, $namaAyah, $listnoHPAyah[$i]);
//             $hasil->execute();
//         }

        
//         if ($listnoHPIbu[$i] != "") {
//             $sql = "INSERT INTO `ibu` (`idBooking`, `namaIbu`, `noHPI`) VALUES (?, ?, ?)";
//             $hasil = $conn->prepare($sql);
//             $hasil->bind_param("iss", $id, $namaIbu, $listnoHPIbu[$i]);
//             $hasil->execute();
//         }
//     }
// header("location:Data_Booking.php");
//         }
//         else if(isset($_POST['doneEdit'])){
//             $idBooking=isset($_POST['idBooking']) ? $_POST['idBooking'] : "";
//             $tanggalBooking = isset($_POST['tanggalBooking']) ? $_POST['tanggalBooking'] : "";
//             $namaPanggilan = isset($_POST['namaPanggilan']) ? $_POST['namaPanggilan'] : "";
//             $tempat = isset($_POST['tempat']) ? $_POST['tempat'] : "";
//             $tglLahir = isset($_POST['tglLahir']) ? $_POST['tglLahir'] : "";
//             $converted_date = date('Y-m-d', strtotime($tglLahir));
//             $jenisKelamin = isset($_POST['jenisKelamin']) ? $_POST['jenisKelamin'] : "";
//             $sekolah = isset($_POST['sekolah']) ? $_POST['sekolah'] : "";
//             $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : "";
//             $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
//             $namaAyah = isset($_POST['namaAyah']) ? $_POST['namaAyah'] : "";
//             $namaIbu = isset($_POST['namaIbu']) ? $_POST['namaIbu'] : "";
//             $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";
//             $tb = isset($_POST['tb']) ? $_POST['tb'] : "";
//             $bb = isset($_POST['bb']) ? $_POST['bb'] : "";
//             $golonganDarah= isset($_POST['golonganDarah']) ? $_POST['golonganDarah'] : "";
//             $noHPAyah1 = $_POST['noHPAyah1'];
//             $noHPAyah2 = $_POST['noHPAyah2'];
//             $noHPAyah3 = $_POST['noHPAyah3'];
//             $noHPIbu1 = $_POST['noHPIbu1'];
//             $noHPIbu2 = $_POST['noHPIbu2'];
//             $noHPIbu3 = $_POST['noHPIbu3'];
//             $alergi=$_POST['alergi'];
//             $keterangan = $_POST['keterangan'];
//             $idKelompok=$_POST['idKelompok'];
//             $sql = "UPDATE `Booking` SET `tanggalBooking`=?, `namaPanggilan`=?, `Tempat`=?, `tanggalLahir`=?, `jenisKelamin`=?, `sekolah`=?, `kelas`=?, `alamat`=?, `namaAyah`=?, `namaIbu`=?, `Instagram`=?, `TB(cm)`=?, `BB(kg)`=?, `Gol.Darah`=?, `Alergi`=?, `idKeterangan`=? ,`idKelompok`=? WHERE `idBooking`=?";
//             $hasil = $conn->prepare($sql);
//             $hasil->bind_param("ssssssisssssssiiss", $tanggalBooking, $namaPanggilan, $tempat, $converted_date, $jenisKelamin, $sekolah, $kelas, $alamat, $namaAyah, $namaIbu, $instagram, $tb, $bb, $golonganDarah, $alergi, $keterangan,$idKelompok, $idBooking);
//             $hasil->execute();
//                 $sql = "DELETE FROM `ayah` WHERE `idBooking` = ? ";
//                 $hasil = $conn->prepare($sql);
//                 $hasil->bind_param("i", $idBooking);
//                 $hasil->execute();
//                 $sql = "DELETE FROM `ibu` WHERE `idBooking` = ? ";
//                 $hasil = $conn->prepare($sql);
//                 $hasil->bind_param("i", $idBooking);
//                 $hasil->execute();

//             $listnoHPAyah=[$noHPAyah1,$noHPAyah2,$noHPAyah3];
//             $listnoHPIbu=[$noHPIbu1,$noHPIbu2,$noHPIbu3];
//                 for ($i = 0; $i < 3; $i++) {
                    
//                     if ($listnoHPAyah[$i] != "") {
//                         $sql = "INSERT INTO `ayah` (`idBooking`, `namaAyah`, `noHPA`) VALUES (?, ?, ?)";
//                         $hasil = $conn->prepare($sql);
//                         $hasil->bind_param("iss", $idBooking, $namaAyah, $listnoHPAyah[$i]);
//                         $hasil->execute();
//                     }

                    
//                     if ($listnoHPIbu[$i] != "") {
//                         $sql = "INSERT INTO `ibu` (`idBooking`, `namaIbu`, `noHPI`) VALUES (?, ?, ?)";
//                         $hasil = $conn->prepare($sql);
//                         $hasil->bind_param("iss", $idBooking, $namaIbu, $listnoHPIbu[$i]);
//                         $hasil->execute();
//                     }
//                 }
// header("location:Data_Booking.php");
//         }




// }
// else if ($_SERVER["REQUEST_METHOD"] == "GET") {
// if(isset($_GET['idEdit'])){
// $id=$_GET['idEdit'];

// $sql="SELECT * from Booking m inner join kelompok kel on kel.idKelompok=m.idKelompok inner join keterangan k on k.idKeterangan=m.idKeterangan where idBooking=$id";
// $result = $conn->query($sql);

// while ($row = $result->fetch_assoc()) {

//     $tanggalBooking = $row['tanggalBooking'] ;
//        $namaPanggilan = $row['namaPanggilan'] ;
//        $tempat =  $row['Tempat'] ;
//        $tglLahir =  $row['tanggalLahir'] ;
//        $converted_date = date('Y-m-d', strtotime($tglLahir));
//        $jenisKelamin =  $row['jenisKelamin'] ;
//        $sekolah = $row['sekolah'] ;
//        $kelas =  $row['kelas'] ;
//        $alamat =  $row['alamat'] ;
//        $namaAyah =  $row['namaAyah'] ;
//        $namaIbu =  $row['namaIbu'] ;
//        $instagram =  $row['Instagram'] ;
//        $tb =  $row['TB(cm)'] ;
//        $bb =  $row['BB(kg)'] ;
//        $golonganDarah= $row['Gol.Darah'] ;
//        $alergi=$row['Alergi'];
//        $keterangan = $row['idKeterangan'];
//        $namaKelompok=$row['namaKelompok'];
//        $idKelompok=$row['idKelompok'];


// }
// $ayah=array();
// $ibu=array();
// $sql = "SELECT noHPA FROM ayah WHERE idBooking=" . $id;
// $resultt = $conn->query($sql);
// while ($roww = $resultt->fetch_assoc()) {
// array_push($ayah,$roww['noHPA']); 
// }
// $sql = "SELECT noHPI FROM ibu WHERE idBooking=" . $id;
// $resultt = $conn->query($sql);
// while ($roww = $resultt->fetch_assoc()) {
// array_push($ibu,$roww['noHPI']); 
// }
// $noHPAyah1 = isset($ayah[0]) ? $ayah[0] : '';
// $noHPAyah2 = isset($ayah[1]) ? $ayah[1] : '';
// $noHPAyah3 = isset($ayah[2]) ? $ayah[2] : '';

// $noHPIbu1 = isset($ibu[0]) ? $ibu[0] : '';
// $noHPIbu2 = isset($ibu[1]) ? $ibu[1] : '';
// $noHPIbu3 = isset($ibu[2]) ? $ibu[2] : '';

// }
// else if(isset($_GET['idDell'])){




// $id=$_GET['idDell'];
//     $sql = "DELETE FROM `ayah` WHERE `idBooking` = ? ";
//     $hasil = $conn->prepare($sql);
//     $hasil->bind_param("i", $id);
//     $hasil->execute();
//     $sql = "DELETE FROM `ibu` WHERE `idBooking` = ? ";
//     $hasil = $conn->prepare($sql);
//     $hasil->bind_param("i", $id);
//     $hasil->execute();
//        $sql = "DELETE FROM `Booking` WHERE `idBooking` = ? ";
//     $hasil = $conn->prepare($sql);
//     $hasil->bind_param("i", $id);
//     $hasil->execute();
    
// header("location:Data_Booking.php");




 
// }



//     }

$isi = "
<div class='card mb-4' style='margin-top:10%'>
    <div class='card-header'>
       <h1>";
        if(isset($_GET['idEdit'])){
        $id=$_GET['idEdit'];
               $isi.="Edit Data Booking";
        }
        else {
               $isi.="Input Data Booking";
        } 

      $isi.="



       </h1>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='tanggalBooking' class='form-label'><b>Tanggal Booking</b></label>
                <input type='hidden' class='form-control' id='idBooking' name='idBooking' value='$id' required>
                <input type='date'  class='form-control' id='tanggalBooking' name='tanggalBooking' value='$tanggalBooking' required>
            </div>
            <div class='mb-3'>
            <label for='waktuBooking' class='form-label'><b>Waktu Booking</b></label>
            
            <select class='form-select' aria-label='Default select example' name='waktuBooking' required>
                <option selected value='Belum Memilih Waktu'>--Pilih Waktu--</option>
                <option value='09:00'>09:00</option>
                <option value='09:30'>09:30</option>
                <option value='10:00'>10:00</option>
                <option value='10:30'>10:30</option>
                <option value='11:00'>11:00</option>
                <option value='11:30'>11:30</option>
                <option value='12:00'>12:00</option>
                <option value='12:30'>12:30</option>
                <option value='13:00'>13:00</option>
                <option value='13:30'>13:30</option>
                <option value='14:00'>14:00</option>
                <option value='14:30'>14:30</option>
                <option value='15:00'>15:00</option>
                <option value='15:30'>15:30</option>
                <option value='16:00'>16:00</option>
                <option value='16:30'>16:30</option>
                <option value='17:00'>17:00</option>
                <option value='17:30'>17:30</option>
                <option value='18:00'>18:00</option>
                <option value='18:30'>18:30</option>
                <option value='19:00'>19:00</option>
                <option value='19:30'>19:30</option>
                <option value='20:00'>20:00</option>
                <option value='20:30'>20:30</option>
                <option value='21:00'>21:00</option>    
            </select>
            </div>
            <div class='mb-3'>
                <label for='durasiBooking' class='form-label'><b>Durasi Booking (Jam)</b></label>
                <input type='number' class='form-control' id='durasiBooking' name='durasiBooking' min='1' value='$durasiBooking' required>
            </div>
            <div class='mb-3'>
                <label for='namaBooking' class='form-label'><b>Nama Booking</b></label>
                <input type='text' class='form-control' id='namaBooking' name='namaBooking' value='$namaBooking' required>
            <div class='mb-3'>
                <label for='tanggalBooking' class='form-label'><b>Jenis Booking</b></label>
                <select class='form-select' aria-label='Default select example' name='idJasa' required>
                    <option selected>Pilih Kelompok</option>";
                    $sql="SELECT * from jasa";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $isi.="<option value='".$row['idJasa']."'>".$row['namaJasa']."</option>";
                    }
                    $isi.="</select>
            </div>


            
            


            <input type='submit' class='btn btn-primary' value='";
                  if(isset($_GET['idEdit'])){
                  $id=$_GET['idEdit'];
                         $isi.="Selesai Edit' name='doneEdit'>";
                  }
                  else {
                         $isi.="Submit' name='add'>";
                  } 

                $isi.="
        </form>
    </div>
</div>";

include 'index.php';  
?>
