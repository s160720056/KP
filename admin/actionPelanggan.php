<?php

include 'config.php';
$conn = connectToDatabase(); 

$id="";
$alamatEmail=$noHP=$namaPelanggan="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['add'])){
      $namaPelanggan=$_POST['namaPelanggan'];
      $alamatEmail=$_POST['alamatEmail'];
      $noHP=$_POST['noHP'];
      //if empty alert
        if($namaPelanggan=="" || $alamatEmail=="" || $noHP==""){
            echo "<script>alert('Data Tidak Boleh Kosong')</script>";
            exit;
        }

        //eheck if pelanggans exist
        $sql="SELECT * from pelanggans where nama='$namaPelanggan' and alamat='$alamatEmail' and no_hp='$noHP' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //pelanggan exist
            echo "<script>alert('Pelanggan Sudah Terdaftar')</script>";
            exit;
        }     
        else{
               //insert into pelanggans
                $sql = "INSERT INTO `pelanggans` (`nama`, `alamat`, `no_hp`) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $namaPelanggan, $alamatEmail, $noHP);
                $stmt->execute();
                header("location:dataPelanggan.php");
            }
        


    }
    else if(isset($_POST['doneEdit'])){
        $id=$_POST['idEdit'];
        $namaPelanggan=$_POST['namaPelanggan'];
        $alamatEmail=$_POST['alamatEmail'];
        $noHP=$_POST['noHP'];
        //if empty alert
          if($namaPelanggan=="" || $alamatEmail=="" || $noHP==""){
              echo "<script>alert('Data Tidak Boleh Kosong')</script>";
              exit;
          }
  
          //eheck if pelanggans exist
          $sql="SELECT * from pelanggans where nama='$namaPelanggan' and alamat='$alamatEmail' and no_hp='$noHP' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              //pelanggan exist
              echo "<script>alert('Pelanggan Sudah Terdaftar')</script>";
              exit;
          }     
          else{
                 //insert into pelanggans
                  $sql = "UPDATE `pelanggans` SET `nama` = ?, `alamat` = ?, `no_hp` = ? WHERE `pelanggans`.`id` = $id";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("sss", $namaPelanggan, $alamatEmail, $noHP);
                  $stmt->execute();
                  header("location:dataPelanggan.php");
              }
          
  
  
    }
       
}

else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['idDell'])){
        $id=$_GET['idDell'];
        $sql="DELETE FROM pelanggans WHERE id=$id";
        $result = $conn->query($sql);
        header("location:dataPelanggan.php");
    
    }
    else if(isset($_GET['idEdit'])){
        $id=$_GET['idEdit'];
        $sql="SELECT * FROM pelanggans WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $namaPelanggan=$row['nama'];
        $alamatEmail=$row['alamat'];
        $noHP=$row['no_hp'];
    }
}


$isi = "
<div class='card mb-4' style='margin-top:10%'>
    <div class='card-header'>
       <h1>";
        if(isset($_GET['idEdit'])){
        $id=$_GET['idEdit'];
               $isi.="Edit Data Pelanggan";
        }
        else {
               $isi.="Input Data Pelanggan";
        } 

      $isi.="



       </h1>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaPelanggan' class='form-label'><b>Nama Pelanggan</b></label>
                <input type='hidden' name='idEdit' value='$id'>
                <input type='text' class='form-control' id='namaPelanggan' name='namaPelanggan' value='$namaPelanggan' required>
            </div>
            <div class='mb-3'>
                <label for='alamatEmail' class='form-label'><b>Alamat Email</b></label>
                <input type='email' class='form-control' id='alamatEmail' name='alamatEmail' value='$alamatEmail' required>
            </div>
            <div class='mb-3'>
                <label for='noHP' class='form-label'><b>Nomor Telepon</b></label>
                <input type='text' class='form-control' id='noHP' name='noHP' value='$noHP' required>
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
