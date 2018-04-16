 <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Cash</th>
                                            <th>Nama Pembeli</th>
                                            <th>Merk Mobil</th>
                                            <th>Tanggal Beli</th>
                                            <th>Uang Pembeli</th>
                                            <th>Kembalian</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                     include "koneksi/koneksi.php";
$query=mysql_query("SELECT A.kode_cash,B.merk,A.cash_tanggal,A.cash_bayar,A.cash_kembalian,A.kode_mobil,A.id,C.id,C.nama_pembeli,A.status FROM beli_cash A , mobil B , pembeli C WHERE A.id = C.id AND A.kode_mobil = B.kode_mobil  order by A.cash_tanggal desc");
                                     $no=1;
                                       $jumlah = mysql_num_rows($query);
  if ($jumlah > 0) {  
                                     while($a=mysql_fetch_array($query)){
                                        $number=$a['cash_bayar'];
                                        $number1=$a['cash_kembalian'];
                                        $format_indonesia = number_format ($number, 2, ',', '.');
                                         $format_indonesia1 = number_format ($number1, 2, ',', '.');
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $a['kode_cash']; ?></td>
                                            <td><?php echo $a['nama_pembeli']; ?></td>
                                            <td>
<a title="Detail Data" class="Open" data-toggle="modal" data-id="<?php echo $a['kode_mobil']; ?>" href="#">
                                            <?php echo $a['merk']; ?></a>
                                            </td>
                                            <td><?php echo $a['cash_tanggal']; ?></td>
                                            <td><?php echo "Rp.".$format_indonesia; ?></td>
                                            <?php
                                                $pas=$a['cash_kembalian'];
                                                if($pas==0){
                                            ?>
                                            <td><?php echo "Uang Pas"; ?></td>
                                            <?php
                                            }
                                                else
                                                {
                                                    echo "<td>Rp.".$format_indonesia1."</td>";
                                                }
                                          ?>
                                          <?php
                                          $stat=$a['status'];
                                          if($stat=='Masih Di Proses'){
                                          ?>
                                          <td><a href="cash-edit.php?id=<?php echo $a['kode_cash']; ?>&status=Berhasil" class="btn btn-danger"><?php echo $stat; ?></a></td>
                                          <?php
                                            }
                                                else
                                                { ?>
                                <td><a href="cash-edit.php?id=<?php echo $a['kode_cash']; ?>&status=Masih Di Proses" class="btn btn-success"><?php echo $stat; ?></td>
                                <?php
                                                }
                                          ?>
                                        </tr>
 <?php
    }
    }
    else {  
    // menampilkan pesan zero data 
    echo '<br>'; 
     echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> Maaf, Keranjang Anda Masih Kosong.</div>';  
    } 
    ?>
                                    </tbody>
                                </table>