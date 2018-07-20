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
        <h2>Master Komponen List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>ID Komponen</th>
		<th>Nama Komponen</th>
		<th>Jenis Komponen</th>
		<th>Keterangan</th>
		<!-- <th>Gambar</th> -->
		
            </tr><?php
            foreach ($masterkomponen_data as $masterkomponen)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $masterkomponen->id_komponen ?></td>
		      <td><?php echo $masterkomponen->nama_komponen ?></td>
		      <td><?php echo $masterkomponen->jenis_komponen ?></td>
		      <td><?php echo $masterkomponen->keterangan ?></td>
		      <!-- <td><?php echo $masterkomponen->gambar_komponen ?></td> -->	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>