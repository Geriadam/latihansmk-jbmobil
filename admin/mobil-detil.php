<?php
                                            include "koneksi/koneksi.php";
                                             $mobil=$_GET['mobil'];
                                           $guak=mysql_query("select * FROM mobil WHERE kode_mobil='$mobil'");
                                            while($a=mysql_fetch_array($guak)){
                                            ?>
<p align="center"><img src="gambar-mobil/<?php echo $a[4]; ?>" width="150" height="200"></p>
 <p align="right"><button aria-hidden="true" data-dismiss="modal" type="button" class="btn btn-danger" name="close">Close</button></p>
                                              <?php
                                              }
                                              ?>