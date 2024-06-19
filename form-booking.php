<?php
session_start();
include 'config.php';
$conn = connectToDatabase(); 
if(isset($_SESSION['idUser'])){

}   
else{
    header("location:login.php");
}





?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Booking</title>
		<link rel="icon" href="/images/favicon.png">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fontawesome.min.css">
		<link rel="stylesheet" href="css/LineIcons.css">
		<link rel="stylesheet" href="css/fakeLoader.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
    <header style="text-align: center;padding-top: 100px;">Booking</header>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a href="/index.html" class="navbar-brand"><img src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>
<div id="contact" class="contact section mt-3">
    <div class="container">
        <div class="box-content">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                       <div class="content">
                           <h5>Address</h5>
                           <p>Jl. Babadan Rukun VII, Surabaya, Indonesia 61079</p>
                           <h5>Phone</h5>
                           <p>+62-8511-3094-134</p>
                           <h5>Email</h5>
                           <p>mimin@originfamous.id</p>
                           <h5>Tanggal Pesan & Jam</h5>

                       </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="content-right">
                        <form action="contact-form.php" class="contact-form" id="contact-form" method="post">
                            <div class="row">
                                <div class="col">
                                    <div id="first-name-field">
                                        <input type="text" placeholder="Nama Lengkap" name="name" required>
                                    </div>
                                </div>
                                <div class="col">
                                     <div id="email-field" class="form-group">
                                        <input type="text" class="mb-1" placeholder="No Hp" name="phone" required>
                                        <small id="emailHelp" class="form-text text-muted text-left">* Yang dapat dihubungi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="email-field">
                                       <input type="email" placeholder="Email" name="email" required>
                                   </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="subject-field" class="input-group ">
                                        <select class="form-select-lg" name="services" required>
                                        <option selected value="Belum Memilih Layanan">--Pilih Layanan--</option>
                                            <?php
                                              $sql="SELECT * from jasa where status=1";
                                              $result = $conn->query($sql);
                                              while ($row = $result->fetch_assoc()) {
                                                $isi="<option value='".$row['namaJasa']."'>".$row['namaJasa']."</option>";
                                                echo $isi;
                                              }
                                            ?>
<!--                                        
                                            <option value="Solo">Solo</option>
                                            <option value="Couple">Couple</option>
                                            <option value="Bestfriend">Bestfriend</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                             <div class="row">
                                 <div class="col">
                                     <div id="date-field" class="input-group">
                                         <!-- Date input -->
                                            <input type="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                                     </div>
                                 </div>
                                 <div class="col">

                                    <div id="time-field" class="input-group">
                                        <select class="form-select-lg" name="time" required>
                                            <option selected value="Belum Memilih Waktu">--Pilih Waktu--</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>    
                                        </select>
                                 </div>
                             </div>
                         </div>
                            <input type="hidden" name="wa" value="6285157774134">
                            <button class="button" type="submit" id="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>