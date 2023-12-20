<?php
$bulanFilter = $tahunFilter = "";

include 'config.php';
$conn = connectToDatabase();
$sql = "SELECT * from pelanggans order by id desc ";
$result = $conn->query($sql);

$isi = "  

<div class='card mb-4' style='margin-top:10%'>

                            <div class='card-header' >
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Data Pelanggan</h5>
                                        <a href='actionPelanggan.php' class='btn btn-primary'>Tambah Pelanggan</a>

                                    </div>
                                </div>
                            <div class='card-body' >
                                <table id='datatablesSimple' class='table table-bordered mx-auto'>
                                   <thead>
                                       <tr>
                                           <th>Nama</th>
                                           <th>Email</th>
                                           <th>No HP</th>
                                            <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Action</th>
                                       </tr>
                                   </tfoot>
                                    <tbody>
                                       ";


                                    while ($row = $result->fetch_assoc()) {

                                        $isi .= "<tr>
                                                <td>" . $row['nama'] . "</td>
                                                <td>" . $row['alamat'] . " </td>
                                                <td>" . $row['no_hp'] . " </td>
                                                <td>
                                                    <a href='actionPelanggan.php?idEdit=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                                                    <a onclick='hapus(" . $row['id'] . ")' class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr>";
                                                        }

                                                        $isi .= "
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            <script>
                            function hapus(id) {
                                const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
                                
                                if (confirmation) {
                                    
                                    window.location.href = 'actionPelanggan.php?idDell='+id; 
                                } else {
                                    
                                    
                                    alert('Hapus Dibatalkan');
                                }
                            }

                            </script>

                        ";



include 'index.php';
$isi = "<script>


</script>
";