<?php
session_start();
// if(!isset($_SESSION['user'])){
//     header("location:login.php");
// }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Be Famous Studio</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Pesanan</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Pesanan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Daftarfoto.php">Daftar foto</a>
                                    <a class="nav-link" href="Kategorifoto.php">Kategori Foto</a>
                                    <a class="nav-link" href="Daftarpesanan.php">Daftar Pesanan</a>
                                    <a class="nav-link" href="Keteranganpesanan.php">Keterangan Pesanan</a>   
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMaster" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseMaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="jasa.php">Daftar Jasa</a>
                                    <!-- <a class="nav-link" href="Kategorifoto.php">Kategori Foto</a>
                                    <a class="nav-link" href="Daftarpesanan.php">Daftar Pesanan</a>
                                    <a class="nav-link" href="Keteranganpesanan.php">Keterangan Pesanan</a>    -->
                                </nav>
                            </div>



                                


                            
                            








                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Admin
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Booking
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="booking.php">Booking</a>
                                            <a class="nav-link" href="booking-details.php">Booking Details</a>

                                            
                                        </nav>
                                    </div>
                                    
                                    <a class="nav-link" href="portfolio.php">Add Portfolio</a>
                                    <a class="nav-link" href="about.php">about</a>
                                    <a class="nav-link" href="service.php">service</a>
                                    
                                </nav>
                            </div>
                       


                            
                            



                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Be Famous Studio
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">


                        <?php
                        if(isset($isi)){
                            echo $isi;
                        } 
                        else{
                            echo "<h1 class='mt-4'>Dashboard</h1>
                        <ol class='breadcrumb mb-4'>
                            <li class='breadcrumb-item active'>Dashboard</li>
                        </ol>
                        <div class='row'>
                            <div class='col-xl-3 col-md-6'>
                                <div class='card bg-primary text-white mb-4'>
                                    <div class='card-body'>Primary Card</div>
                                    <div class='card-footer d-flex align-items-center justify-content-between'>
                                        <a class='small text-white stretched-link' href='#'>View Details</a>
                                        <div class='small text-white'><i class='fas fa-angle-right'></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xl-3 col-md-6'>
                                <div class='card bg-warning text-white mb-4'>
                                    <div class='card-body'>Warning Card</div>
                                    <div class='card-footer d-flex align-items-center justify-content-between'>
                                        <a class='small text-white stretched-link' href='#'>View Details</a>
                                        <div class='small text-white'><i class='fas fa-angle-right'></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xl-3 col-md-6'>
                                <div class='card bg-success text-white mb-4'>
                                    <div class='card-body'>Success Card</div>
                                    <div class='card-footer d-flex align-items-center justify-content-between'>
                                        <a class='small text-white stretched-link' href='#'>View Details</a>
                                        <div class='small text-white'><i class='fas fa-angle-right'></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xl-3 col-md-6'>
                                <div class='card bg-danger text-white mb-4'>
                                    <div class='card-body'>Danger Card</div>
                                    <div class='card-footer d-flex align-items-center justify-content-between'>
                                        <a class='small text-white stretched-link' href='#'>View Details</a>
                                        <div class='small text-white'><i class='fas fa-angle-right'></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-6'>
                                <div class='card mb-4'>
                                    <div class='card-header'>
                                        <i class='fas fa-chart-area me-1'></i>
                                        Area Chart Example
                                    </div>
                                    <div class='card-body'><canvas id='myAreaChart' width='100%' height='40'></canvas></div>
                                </div>
                            </div>
                            <div class='col-xl-6'>
                                <div class='card mb-4'>
                                    <div class='card-header'>
                                        <i class='fas fa-chart-bar me-1'></i>
                                        Bar Chart Example
                                    </div>
                                    <div class='card-body'><canvas id='myBarChart' width='100%' height='40'></canvas></div>
                                </div>
                            </div>
                        </div>";
                        }
                     
                        ?>
                    </div>
                </main>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js">
            
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <style>
            .red{
                color: red;
            }
            .green{
                color: green;
            }
        </style>
    </body>
</html>
