<?php
  include "koneksi/koneksi.php";
  $mobil=$_GET['mobil'];
  $guak=mysqli_query($koneksi, "select * FROM mobil WHERE kode_mobil='$mobil'");
  while($a=mysqli_fetch_array($guak, MYSQLI_NUM)){
    $number=$a[3];
    $format_indonesia = number_format ($number, 2, ',', '.');
?>
  <p align="center"><img src="admin/gambar-mobil/<?php echo $a[4]; ?>"width="200" height="150"></p>
    <table border="0">
      <tr>
        <td width="10">Merk</td>
        <td width="10">:</td>
        <td><?php echo $a[1]; ?></td>
      </tr>
      <tr>
        <td>Tipe</td>
        <td>:</td>
        <td><?php echo $a[2]; ?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>:</td>
        <td><?php echo "Rp.".$format_indonesia; ?></td>
      </tr>
    </table>
  <p align="right">
    <button aria-hidden="true" data-dismiss="modal" type="button" class="btn btn-danger" name="close">Close</button>
  </p>
<?php } ?>