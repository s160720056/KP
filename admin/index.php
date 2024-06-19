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
    <style>
        .bg-purple {
            background-color: #604CAB; /* Hex code untuk warna ungu */
        }
        .color-white {
            color: white;
        }

        .rounded-corner {
    border-radius: 25px; /* Sesuaikan nilai untuk mengatur seberapa bulat sudutnya */
    border-bottom-left-radius: 0px; /* Sesuaikan nilai untuk mengatur seberapa bulat sudutnya */
    border-bottom-right-radius: 0px; /* Sesuaikan nilai untuk mengatur seberapa bulat sudutnya */
    overflow: hidden; /* Opsional: untuk memastikan konten di dalam div juga mengikuti sudut bulat */
}


    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-purple">
        <!-- Navbar Brand-->
       
        <a class="navbar-brand ps-3" href="index.php"> <img src="../images/logof.png" alt="" width="100%"></a>
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
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-purple" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading color-white"></div>
                        <a class="nav-link color-white" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed color-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMaster" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseMaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link color-white" href="jasa.php">Daftar Jasa</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed color-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Admin
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed color-white" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Booking
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link color-white" href="booking.php">Booking</a>
                                    </nav>
                                </div>
                                <a class="nav-link color-white" href="dataPelanggan.php">Data Pelanggan</a>
                            </nav>
                        </div>
                        <a class="nav-link color-white" href="chat/pages/chat.html" target="_blank">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                            Chat
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small color-white">Logged in as:</div>
                    Be Famous Studio
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div style="background-color:#604CAB;">
                <div class="container-fluid px-4 rounded-corner" style="background-color:white;">
                    <?php
                    if (isset($isi)) {
                        echo $isi;
                    } else {
                        include 'config.php';
                        $currentDate = date("Y-m-d");
                        $conne = connectToDatabase();
                        $sqli = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa where tanggalBooking='$currentDate' order by b.tanggalBooking desc , b.waktuBooking desc ";
                        $resulto = $conne->query($sqli);
                        $isi = "<h1 class='mt-4'>Welcome</h1>
                        <ol class='breadcrumb mb-4'>
                            <li class='breadcrumb-item active'>Jadwal Hari Ini </li>
                        </ol>
                        <div class='row'>
                        <table id='datatablesSimple' class='table table-bordered mx-auto'>
                         <thead>
                                       <tr>
                                           <th>Date</th>
                                           <th>Time</th>
                                           <th>Duration</th>
                                           <th>Nama Booking</th>
                                           <th>Team</th>
                                           <th>Appointment type</th>
                                           <th>Status</th>
                                         
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                             <th>Date</th>
                                             <th>Time</th>
                                             <th>Duration</th>
                                             <th>Nama Booking</th>
                                             <th>Team</th>
                                             <th>Appointment type</th>
                                             <th>Status</th>
                                       </tr>
                                   </tfoot>
                        <tbody>
                        ";
                        while ($row = $resulto->fetch_assoc()) {
                            //remove $waktubooking  17:00:00.000000 to 17:00
                            $waktuBooking = substr($row['waktuBooking'], 0, 5);
                            $dateString = $row['tanggalBooking'];
                            $dateTime = new DateTime($dateString);
                            $dmyFormat = $dateTime->format("d-m-Y");

                            $isi .= "<tr>
                                                <td>" . $dmyFormat . "</td>
                                                <td>" . $waktuBooking . " </td>
                                                <td>" . $row['durasiBooking'] . " Jam </td>
                                                <td>" . $row['namaBooking'] . "</td>
                                                <td></td>
                                                <td>" . $row['namaJasa'] . "</td>
                                                <td>" . $row['statusBooking'] . "</td>
                                                <td>
                                                    <a href='actionBooking.php?idEdit=" . $row['idBooking'] . "' class='btn btn-primary'>Edit</a>
                                                    <a onclick='hapus(" . $row['idBooking'] . ")' class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr>";
                        }

                        $isi .= "
                        </tbody>
                        </table>
                        </div>";
                        echo $isi;
                    }
                    ?>
                </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
