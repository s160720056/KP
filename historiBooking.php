<?php
include 'config.php';
$conn = connectToDatabase();

session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famous Studio</title>
    <link rel="icon" href="images/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/LineIcons.css">
    <link rel="stylesheet" href="css/fakeLoader.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
.float-button {
    position: fixed;
    right: -100px;
    bottom: 0px;
    transition: all 0.2s ease-in 0s;
    z-index: 9999;
    cursor: pointer;
    width: 250px;
    height: 75 px;
    /*		background-color: yellow;*/
}

.chat-form {
    display: none;
    position: fixed;
    right: 10px;
    bottom: 80px;
    width: 300px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 5px;
}

/* Style untuk tombol */
.float-button {
    position: fixed;
    right: 20px;
    bottom: 50px;
    z-index: 9999;
    cursor: pointer;
    width: 100px;
    height: 50px;
}








/*		.float-button:hover {
		right: -10px;
		}*/
</style>

<body>

    <!-- loader -->
    <div class="fakeLoader"></div>
    <!-- end loader -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-md fixed-top " style="background-color:#604CAB">
        <div class="container">
            <a href="index.php" class="navbar-brand"><img src="images/logof.png" alt="" width="100%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <?php
include 'navbar.php'
?>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
<?php
$isi="";
if(isset($_SESSION['idUser'])){
    $idUser=$_SESSION['idUser'];
    $sql = "SELECT * FROM bookings b inner join jasa j on j.idJasa=b.idJasa WHERE idUser=$idUser ";
    $result = $conn->query($sql);
    $isi = "
    <div class='container'>
    <div class='card mb-4' style='margin-top:10%'>
        <div class='card-header'>
            <h1 class='text-center'>History Booking</h1>
        </div>
        <div class='card-body'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>Tanggal Booking</th>
                        <th scope='col'>Waktu Booking</th>
                        <th scope='col'>Durasi Booking</th>
                        <th scope='col'>Nama Booking</th>
                        <th scope='col'>Status Booking</th>
                        <th scope='col'>Jasa</th>
                    </tr>
                </thead>
                <tbody>";
    $no=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $isi .= "
            <tr>
                <td>$no</td>
                <td>" . $row['tanggalBooking'] . "</td>
                <td>" . substr($row['waktuBooking'], 0, 5) . "</td>
                <td>" . $row['durasiBooking'] . "Menit</td>
                <td>" . $row['namaBooking'] . "</td>
                <td>";
            if ($row['statusBooking'] == 0) {
                $isi .= "<span class='badge bg-warning'>Pending</span>";
            } else if ($row['statusBooking'] == 1) {
                $isi .= "<span class='badge bg-success'>Approved</span>";
            } else if ($row['statusBooking'] == 2) {
                $isi .= "<span class='badge bg-danger'>Canceled</span>";
            }
            $isi .= "</td>
                <td>" . $row['namaJasa'] . "</td>
            </tr>";
            $no++;
        }
    } else {
        $isi .= "<tr><td colspan='7'>No data found</td></tr>";
    }
    $isi .= "
                </tbody>
            </table>
        </ div>
    </div>
</div>";
}
else{
    $isi = "<div class='container'>
    <div class='card mb-4' style='margin-top:10%'>
        <div class='card-header'>
            <h1 class='text-center'>History Booking</h1>
        </div>
        <div class='card-body'>
            <h1 class='text-center'>Please login first</h1>
        </div>
    </div>
</div>";
}
echo $isi;













?>
    <?php
	
$ciphering = "BF-CBC";

// Using OpenSSL encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Get the current date and time
$current_date ="abc";

// Generate an initialization vector (IV)
$encryption_iv = random_bytes($iv_length);

// Generate a key (You might want to change this key generation logic for security reasons)
$encryption_key = openssl_digest(php_uname(), 'MD5', true);

// Encryption of the current date begins
$encryption = openssl_encrypt($current_date, $ciphering, $encryption_key, $options, $encryption_iv);


?>
































    <!-- testimonial -->
    <div class="testimonial section bg-grey" id="testimonial">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span><i class="lni lni-quotation"></i></span>
                        <p>Sometimes life doesn't always go the way you want, but you have to keep trying.</p>
                        <h5>Michael Jordan</h5>
                        <span></span>
                    </div>
                    <div class="carousel-item">
                        <span><i class="lni lni-quotation"></i></span>
                        <p>The true price of anything is the toil and difficulty of obtaining it</p>
                        <h5>Adam Smith</h5>
                        <span></span>
                    </div>
                    <div class="carousel-item">
                        <span><i class="lni lni-quotation"></i></span>
                        <p>Only I can change my life. No one can do it for me</p>
                        <h5>Carol Burnett</h5>
                        <span></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end testimonial -->

    <!-- contact -->

    <!-- end contact -->

    <!-- footer -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="content">
                        <div class="brand"><img src="images/logof2.png" alt=""></div>
                        <p>Photo place with the newest and most popular Self Photo, Product Photo, Graduation and
                            Prewedding facilities in Surabaya</p>
                    </div>
                </div>
                <!-- <div class="col-md-3 col-sm-6">
						<div class="content">
							<h5>About</h5>
							<ul>
								<li><a href=""><i class="fa fa-angle-double-right"></i> About us</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Contact</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Portfolio</a></li>
							</ul>
						</div>
					</div> -->
                <div class="col-md-3 col-sm-6">
                    <div class="content">
                        <h5>Support</h5>
                        <ul>
                            <li>
                                <a href="mailto:originfamousid@gmail.com"><i
                                        class="far fa-envelope"></i>originfamousid@gmail.com</a>
                            </li>
                            <li><a href="https://api.whatsapp.com/send?phone=6285157774134&text="><i
                                        class="https://api.whatsapp.com/send?phone=6285157774134&text="><i
                                            class="fab fa-whatsapp"></i> +62-8511-3094-134</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="content">
                        <h5>Follow us</h5>
                        <ul class="social">
                            <li><a href="https://www.instagram.com/befamousstudio/"><i class="fab fa-instagram"></i>
                                    Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end f ooter -->

    <!-- footer bottom -->
    <div class="footer-bottom">
        <span>Copyright © All Right Reserved</span>
    </div>
    <!-- end footer bottom -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        const button = $('.float-button .button');
        const chatForm = $('.float-button .chat-form');
        const chatContent = $('.float-button .chat-content');

        button.on('click', function() {
            chatForm.toggle(); // Mengubah tampilan chat-form
        });

    });
    </script>

    <!-- script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fakeLoader.min.js"></script>
    <script src="js/jquery.filterizr.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        var showAllClicked = false;
        var itemsToShowInitially = 6; // Number of items to show initially

        // Function to toggle visibility of portfolio items
        function togglePortfolioItems() {
            $('.filter-item').hide();
            if (showAllClicked) {
                $('.filter-item').show();
            } else {
                $('.filter-item:lt(' + itemsToShowInitially + ')').show();
            }
        }

        // Initial call to show initial set of items
        togglePortfolioItems();

        // Click event for 'Show All' button
        $('.show-all-button').click(function() {
            showAllClicked = !showAllClicked;
            togglePortfolioItems();

            // Update button text based on state
            if (showAllClicked) {
                $(this).text('Show Less');
            } else {
                $(this).text('Show All');
            }
        });

        // Click event for filter menu
        $('.portfolio-filter-menu ul li').click(function() {
            $('.portfolio-filter-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.filter-item').hide();
            if (selector == 'all') {
                togglePortfolioItems();
            } else {
                $('.filter-item[data-category*="' + selector + '"]').show();
            }
        });
    });
    </script>




</body>

</html>