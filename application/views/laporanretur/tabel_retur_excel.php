<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tabelretur.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
<tr>
							 
       <th>Id Transaksi</th>
        <th>Nama Suplier</th>
        <th>No Invoice</th>
        <th>Nama Kategori</th>
        <th>Id Produk</th>
        <th>Nama Produk</th>
        <th>Jumlah Unit</th>

        
            </tr>
<?php
foreach($data1 as $item) {
?>
<tr>
<td><?php echo $item['id_transaksi']?></td>
<td><?php echo $item['nama_suplier']?></td>
<td><?php echo $item['no_invoice']?></td>
<td><?php echo $item['nama_kategori']?></td>
<td><?php echo $item['id_produk']?></td>
<td><?php echo $item['nama_produk']?></td>
<td><?php echo $item['jumlah_unit']?></td>
</tr>
<?php 
}
 ?>
</table>