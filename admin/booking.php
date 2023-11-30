<?php

include 'config.php';
$conn = connectToDatabase(); 
$sql="SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa ";
$result = $conn->query($sql);
$isi="  
                   
<div class='card mb-4' style='margin-top:10%'>

                            <div class='card-header' >
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Data Booking</h5>
                                        <a href='actionBooking.php' class='btn btn-primary'>Tambah Booking</a>

                                    </div>
                                </div>
                            <div class='card-body' >
                                <table id='datatablesSimple' class='table table-bordered mx-auto'>
                                   <thead>
                                       <tr>
                                           <th>Date</th>
                                           <th>Time</th>
                                           <th>Duration</th>
                                           <th>Booking</th>
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
                                             <th>Booking</th>
                                             <th>Team</th>
                                             <th>Appointment type</th>
                                             <th>Status</th>
                                       </tr>
                                   </tfoot>
                                    <tbody>
                                       ";


                                    while ($row = $result->fetch_assoc()) {
                                        
                                        $isi.="<tr>
                                                <td>".$row['tanggalBooking']."</td>
                                                <td>".$row['waktuBooking']."</td>
                                                <td>".$row['durasiBooking']."</td>
                                                <td>".$row['namaBooking']."</td>
                                                <td></td>
                                                <td>".$row['namaJasa']."</td>
                                                <td>".$row['statusBooking']."</td>
                                                <td>
                                                    <a href='actionBooking.php?idEdit=".$row['idBooking']."' class='btn btn-primary'>Edit</a>
                                                    <a onclick='hapus(".$row['idBooking'].")' class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr>";
                                    }

                                     $isi.="
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            <script>
                            function hapus(id) {
                                const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
                                
                                if (confirmation) {
                                    
                                    window.location.href = 'actionBooking.php?idDell='+id; 
                                } else {
                                    
                                    
                                    alert('Hapus Dibatalkan');
                                }
                            }

                            </script>

                        ";



include 'index.php';  
?>

        
