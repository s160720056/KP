<?php 
session_start();
if(isset(   $_SESSION['user'])){
    
}
else{
    header('Location: login.php');
}




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
    <?php
if(isset($isi)){
    echo " 
    <link href='css/styles.css' rel='stylesheet' />";
}
else{
    echo " 
    <link rel='stylesheet' href='assets/css/style.css'>
    <link href='css/styles.css' rel='stylesheet' />";
}

?>
   
    <script>document.getElementsByTagName("html")[0].className += " js";</script>

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
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link color-white" href="foto.php">Daftar Foto Portfolio</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link color-white" href="pricing.php">Daftar Pricing</a>
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
                        //timexone jakarta
                        date_default_timezone_set('Asia/Jakarta');
                        $currentDate = date("Y-m-d");

                        $conne = connectToDatabase();
                        $sqli = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa where tanggalBooking='$currentDate' order by b.tanggalBooking desc , b.waktuBooking desc ";
                        $resulto = $conne->query($sqli);
                        $isi = "
                         
                        <h1 class='mt-4'>Welcome</h1>
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
                        </div>
                        <div class='cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule'>
    <div class='cd-schedule__timeline' data-w-schedule-timeline='09:00-21:00'  >
      <ul>
        <li><span>09:00</span></li>
        <li><span>09:30</span></li>
        <li><span>10:00</span></li>
        <li><span>10:30</span></li>
        <li><span>11:00</span></li>
        <li><span>11:30</span></li>
        <li><span>12:00</span></li>
        <li><span>12:30</span></li>
        <li><span>13:00</span></li>
        <li><span>13:30</span></li>
        <li><span>14:00</span></li>
        <li><span>14:30</span></li>
        <li><span>15:00</span></li>
        <li><span>15:30</span></li>
        <li><span>16:00</span></li>
        <li><span>16:30</span></li>
        <li><span>17:00</span></li>
        <li><span>17:30</span></li>
        <li><span>18:00</span></li>
        <li><span>18:30</span></li>
        <li><span>19:00</span></li>
        <li><span>19:30</span></li>
        <li><span>20:00</span></li>
        <li><span>20:30</span></li>
        <li><span>21:00</span></li>
        <li><span>21:30</span></li>
        <li><span>22:00</span></li>
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class='cd-schedule__events'>
      <ul>";
      function get_week_dates() {
        $dates = [];
        $today = strtotime('today');
        $sunday = strtotime('last sunday', $today);
        for ($i = 0; $i < 7; $i++) {
            $dates[] = date('Y-m-d', strtotime("+$i days", $sunday));
        }
        return $dates;
    }
    $hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    $dates = get_week_dates();
      for ($i = 0; $i < 7; $i++) {
        $targetDate=$dates[$i];
       
      
          $isi .= "<li class='cd-schedule__group'>
          <div class='cd-schedule__top-info text-center'><span><b>" . $hari[$i] . "</b><br>" . $targetDate . "</span></div>
          <ul>";
          
          $sqli = "SELECT * FROM bookings b INNER JOIN jasa j ON j.idJasa = b.idJasa WHERE tanggalBooking = '$targetDate' and statusBooking='1' ORDER BY b.tanggalBooking DESC, b.waktuBooking DESC";
          $resulto = $conne->query($sqli);
          
          while ($row = $resulto->fetch_assoc()) {
              // Remove seconds from waktuBooking
              $namaBooking=$row['namaBooking'];
              $waktuBooking = substr($row['waktuBooking'], 0, 5);
              $waktuBerakhir = date('H:i', strtotime($waktuBooking . ' + ' . $row['durasiBooking'] . ' hours'));
              $dateString = $row['tanggalBooking'];
              $dateTime = new DateTime($dateString);
              $dmyFormat = $dateTime->format("d-m-Y");
              $isi .= "<li class='cd-schedule__event'>
              <a data-start='$waktuBooking' data-end='$waktuBerakhir' data-content='event-abs-circuit' data-event='event-1' href='#0'>
                <em class='cd-schedule__name'>$namaBooking</em>
              </a>
            </li>";
          }
          $isi .= "</ul>
          </li>";
      }




      



      
      
        // <li class='cd-schedule__group'>
        //   <div class='cd-schedule__top-info'><span>Monday</span></div>
  
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='09:30' data-end='10:30' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuit</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='11:00' data-end='12:30' data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workout</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='14:00' data-end='15:15'  data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //   <div class='cd-schedule__top-info'><span>Tuesday</span></div>
  
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='10:00' data-end='11:00'  data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workout</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='11:30' data-end='13:00'  data-content='event-restorative-yoga' data-event='event-4' href='#0'>
        //         <em class='cd-schedule__name'>Restorative Yoga</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='13:30' data-end='15:00' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuit</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='15:45' data-end='16:45'  data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //   <div class='cd-schedule__top-info'><span>Wednesday</span></div>
  
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='09:00' data-end='10:15' data-content='event-restorative-yoga' data-event='event-4' href='#0'>
        //         <em class='cd-schedule__name'>Restorative Yoga</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='10:45' data-end='11:45' data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='12:00' data-end='13:45'  data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workout</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='13:45' data-end='15:00' data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //   <div class='cd-schedule__top-info'><span>Thursday</span></div>
  
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='09:30' data-end='10:30' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuit</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='12:00' data-end='13:45' data-content='event-restorative-yoga' data-event='event-4' href='#0'>
        //         <em class='cd-schedule__name'>Restorative Yoga</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='15:30' data-end='16:30' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuit</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='17:00' data-end='18:30'  data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workout</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //   <div class='cd-schedule__top-info'><span>Friday</span></div>
  
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='10:00' data-end='11:00'  data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workoutt</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='12:30' data-end='14:00' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuitt</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='15:45' data-end='16:45'  data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1t</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //  <div class='cd-schedule__top-info'><span>Saturday</span></div>
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='09:00' data-end='10:00' data-content='event-abs-circuit' data-event='event-1' href='#0'>
        //         <em class='cd-schedule__name'>Abs Circuit</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='10:30' data-end='11:30' data-content='event-rowing-workout' data-event='event-2' href='#0'>
        //         <em class='cd-schedule__name'>Rowing Workout</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='12:00' data-end='13:15'  data-content='event-restorative-yoga' data-event='event-4' href='#0'>
        //         <em class='cd-schedule__name'>Restorative Yoga</em>
        //       </a>
        //     </li>
  
        //     <li class='cd-schedule__event'>
        //       <a data-start='14:00' data-end='15:00' data-content='event-yoga-1' data-event='event-3' href='#0'>
        //         <em class='cd-schedule__name'>Yoga Level 1</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
        // <li class='cd-schedule__group'>
        //  <div class='cd-schedule__top-info'><span>Sunday</span></div>
        //   <ul>
        //     <li class='cd-schedule__event'>
        //       <a data-start='09:00' data-end='22:00' data-content='event-abs-circuit' data-event='event-5' href='#0'>
        //         <em class='cd-schedule__name'>Libur</em>
        //       </a>
        //     </li>
        //   </ul>
        // </li>
      $isi.="</ul>
      
    </div>
  
    <div class='cd-schedule-modal'>
      <header class='cd-schedule-modal__header'>
        <div class='cd-schedule-modal__content'>
          <span class='cd-schedule-modal__date'></span>
          <h3 class='cd-schedule-modal__name'></h3>
        </div>
  
        <div class='cd-schedule-modal__header-bg'></div>
      </header>
  
      <div class='cd-schedule-modal__body'>
        <div class='cd-schedule-modal__event-info'></div>
        <div class='cd-schedule-modal__body-bg'></div>
      </div>
  
      <a href='#0' class='cd-schedule-modal__close text-replace'>Close</a>
    </div>
  
    <div class='cd-schedule__cover-layer'></div>
  </div> <!-- .cd-schedule -->
                        ";
                        echo $isi;
                        
                    }
                    ?>
                </div>
                </div>
            </main>
        </div>
    </div>
      <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const timeline = document.querySelector('.cd-schedule__timeline ul');
    const times = [
        '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00',
        '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30',
        '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00'
    ];

    timeline.innerHTML = times.map(time => `<li><span>${time}</span></li>`).join('');
});

    </script>
</body>
</html>
