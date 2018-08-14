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
        <h2>Retur Stok List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>ID Aktivitas</th>
		<th>Nama Kategori</th>
        <th>ID Komponen</th>
		<th>Nama Komponen</th>
		<th>Jumlah Unit</th>

		
            </tr><?php
            foreach ($data as $retur)
            {
                ?>
                <tr>
		      <td><?php echo $retur->id_aktivitas?></td>
		      <td><?php echo $retur->nama_kategori ?></td>
              <td><?php echo $retur->id_komponen ?></td>
		      <td><?php echo $retur->nama_komponen ?></td>
              <td><?php echo $retur->jml_komponen ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>