<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Stok List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>Id Transaksi</th>
        <th>Nama Suplier</th>
		<th>No Invoice</th>
		<th>Nama Kategori</th>
        <th>Id Produk</th>
		<th>Nama Produk</th>
		<th>Jumlah Unit</th>

		
            </tr><?php
            foreach ($data as $retur)
            {
                ?>
                <tr>
		      <td><?php echo $retur->id_transaksi?></td>
              <td><?php echo $retur->nama_suplier ?></td>
		      <td><?php echo $retur->no_invoice ?></td>
		      <td><?php echo $retur->nama_kategori ?></td>
              <td><?php echo $retur->id_produk ?></td>
		      <td><?php echo $retur->nama_produk ?></td>
              <td><?php echo $retur->jumlah_unit ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>