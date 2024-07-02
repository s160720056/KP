<ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
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
                    <?php
						if(isset($_SESSION['idUser'])){

						}
						else{
							echo "<li class='nav-item'>
							<a class='nav-link'href='login.php'  class='button2'>Login</a>
						</li>";
						}
?>

                    <li class="nav-item">
                        <a class="nav-link" href="form-booking.php" class="button2">Booking</a>
                    </li>
                    <?php 
						if(isset($_SESSION['idUser'])){
							echo "
							<li class='nav-item'>
							<a class='nav-link'href='historiBooking.php' class='button2'>History Booking</a>
						</li>
							<li class='nav-item'>
							<a class='nav-link'href='logout.php' class='button2'>Logout</a>
						</li>";

						}
						?>
                </ul>