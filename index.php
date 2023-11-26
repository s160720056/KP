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
		<nav class="navbar navbar-expand-md fixed-top">
			<div class="container">
				<a href="index.html" class="navbar-brand"><img src="images/logof.png" alt="" width="100%"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#home">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#portfolio">Portfolio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#services">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#pricing">Pricing</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Login</a>
						</li>

						<li class="nav-item">
							<a class="nav-link"href="form-booking.html" target="_blank" class="button2">Booking</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end navbar -->
		
		<!-- home intro -->
		<div class="home-intro" id="home">
			<div class="container">
				<div class="row">
					<div class="col col-sm-12 col-md-6 col-12">
						<div class="content">
							<h5><span class="line"></span>WELCOME TO FAMOUS STUDIO</h5>
							<h2>A DIGITAL</h2>
							<h2>AGENCY</h2>
							<ul>
								<li><a href="#pricing" class="button">Get Started</a></li>
							</ul>
						</div>
					</div>
					<div class="col col-sm-12 col-md-6 col-12">
						<div class="content-image">
							<img src="images/intro2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end end intro -->

		<!-- about -->
		<!-- <div class="about section bg-grey" id="about">
			<div class="container">
				<div class="title-section">
					<p>ABOUT US</p>
					<h3>Famous Studio</h3>
				</div>
				<div class="row text-center">
					<div class="col-2"></div>
					<div class="col-8">
						<p>Photo place with the newest and most popular Self Photo, Product Photo, Graduation and Prewedding facilities in Surabaya. Surabaya Photo Studio with a monochrome concept and has its own characteristics compared to other studios in Surabaya."</p>
					</div>
					<div class="col-2"></div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-bulb"></i>
							<h5>Self Studio</h5>
							<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit Ea laudantium empore nobis quisquam.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-sun"></i>
							<h5>Wedding Photo</h5>
							<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit Ea laudantium empore nobis quisquam.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-comments"></i>
							<h5>Photo Product</h5>
							<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit Ea laudantium empore nobis quisquam.</p>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-sun"></i>
							<h5>Graduation Photo</h5>
							<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit Ea laudantium empore nobis quisquam.</p>
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</div> -->
		<!-- end about -->
		
<!-- portfolio -->
		<div class="portfolio section mb-4" id="portfolio">
			<div class="container">
				<div class="title-section">
					<p>PORTFOLIO</p>
					<h3>COMMING <span>SOON</span></h3>
					
				</div>
				<div class="box-content">
					<div class="portfolio-filter-menu">
						<ul>
							<li data-filter="all" class="active">
								<span>Show All</span>
							</li>
							<li data-filter="1">
								<span>Self Studio</span>
							</li>
							<li data-filter="2">
								<span>Wedding</span>
							</li>
							<li data-filter="3">
								<span>Product</span>
							</li>
							<li data-filter="4">
								<span>Graduation</span>
							</li>
						</ul>
					</div>
					<div class="row no-gutters filter-container mb-4">
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port1.jpg" class="portfolio-popup">
									<img src="images/port1.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port2.jpg" class="portfolio-popup">
									<img src="images/port2.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port3.jpg" class="portfolio-popup">
									<img src="images/port3.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port4.jpg" class="portfolio-popup">
									<img src="images/port4.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="all,1, 2">
							<div class="content-image">
								<a href="images/port5.jpg" class="portfolio-popup">
									<img src="images/port5.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port6.jpg" class="portfolio-popup">
									<img src="images/port6.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port7.jpg" class="portfolio-popup">
									<img src="images/port7.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 filter-item" data-category="1,4">
							<div class="content-image">
								<a href="images/port8.jpg" class="portfolio-popup">
									<img src="images/port8.jpg" alt="">
									<div class="image-overlay"></div>
									<div class="portfolio-caption">
										<div class="title">
											<h4>Modern Design</h4>
											<span>Graphic Design</span>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end portfolio -->
		
		<!-- services -->
		<div class="services section bg-grey mt-4" id="services">
			<div class="container">
				<div class="title-section">
					<p>SERVICES</p>
					<h3>Choose what</h3>
					<h3>you like our services</h3>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-customer"></i>
							<h5>Self Studio</h5>
							<p class="mb-0">Serving the concept of taking pictures by yourself. There will be no photographers taking pictures so you won't be awkward posing alone or with your partner or friends.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-flower"></i>
							<h5>Wedding Photo</h5>
							<p class="mb-0">Serving the concept of taking pictures for brides who want to get married. There will be a choice of using a photographer or selfish photos, so you feel comfortable when taking pictures with your partner</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-dropbox"></i>
							<h5>Photo Product</h5>
							<p class="mb-0">Serving the concept of taking pictures for products that you want to sell or make a business. The products photographed also have good quality. So you feel happy about the results of the photo</p>
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="content">
							<i class="lni lni-graduation"></i>
							<h5>Graduation Photo</h5>
							<p class="mb-0">Serving the concept of taking pictures for graduates. There will be a choice of using a photographer or selfish photos, so you feel comfortable when taking pictures</p>
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
				<!-- <div class="completed">
					<div class="row">
						<div class="col-md-4">
							<h4>540</h4>
							<span>Clients</span>
						</div>
						<div class="col-md-4">
							<h4>831</h4>
							<span>Project</span>
						</div>
						<div class="col-md-4">
							<h4>65</h4>
							<span>Branch</span>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<!-- end services -->

		<!-- pricing -->
		<div class="pricing section" id="pricing">
			<div class="container">
				<div class="title-section">
					<p>PRICING TABLE</p>
					<h3>Your plance, your choise</h3>
					<br>
					<img src="images/price.jpeg" alt="" width="100%">
					
				</div>
					<img src="/" alt="" srcset="">
					<a href="form-booking.html" target="_blank" class="button2">Booking</a>

			</div>
		</div>
























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






<div class="float-button">
        <button class="button">Chat Now!</button>
        <div class="chat-content" style="display: none;">
            <div id="chatMessages"></div>
        </div>
        <div class="chat-form" style="display: none;">
            <!-- Chat form -->
            <form id="chatForm" method="post" action="chat.php">
                <input type="text" placeholder="Nama" name="nama">
                <textarea placeholder="Pesan" name="pesan"></textarea>
                <button type="submit" id="submitChatForm" name="kirim">Kirim</button>
            </form>
        </div>
    </div>





























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
							<p>Photo place with the newest and most popular Self Photo, Product Photo, Graduation and Prewedding facilities in Surabaya</p>
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
								<li><a href=""><i class="originfamousid@gmail.com"></i> originfamousid@gmail.com</a></li>
								<li><a href=""><i class="https://api.whatsapp.com/send?phone=6285157774134&text="><i class="fab fa-instagram"></i> +62-8511-3094-134</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="content">
							<h5>Follow us</h5>
							<ul class="social">
								<li><a href="https://www.instagram.com/befamousstudio/"><i class="fab fa-instagram"></i> Instagram</a></li>
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

				    // $('#chatForm').on('submit', function(e) {
				    //     e.preventDefault(); // Mencegah pengiriman formulir secara default

				    //     var nama = $(this).find('input[type="text"]').val();
				    //     var pesan = $(this).find('textarea').val();

				    //     // Kirim data ke file PHP menggunakan AJAX
				    //     $.ajax({
				    //         type: "POST",
				    //         url: "process.php", // Ganti dengan URL file PHP Anda
				    //         data: {
				    //             nama: nama,
				    //             pesan: pesan
				    //         },
				    //         success: function(response) {
				    //             // Lakukan sesuatu dengan respon dari PHP (jika diperlukan)
				    //             console.log("Pesan berhasil dikirim: " + response);
				    //             // Misalnya, Anda dapat menampilkan pesan ke pengguna atau melakukan tindakan lain.

				    //             // Setelah pesan berhasil dikirim, tampilkan bagian chat-content
				    //             // chatForm.hide();
				    //             chatContent.show();
				    //         }
				    //     });
				    // });
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



	</body>
</html>