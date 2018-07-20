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
        <h2>Master Suplier List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>ID Suplier</th>
		<th>Nama Suplier</th>
		<th>Alamat</th>
		
            </tr><?php
            foreach ($mastersuplier_data as $mastersuplier)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $masterkomponen->id_suplier ?></td>
		      <td><?php echo $masterkomponen->nama_suplier ?></td>
		      <td><?php echo $masterkomponen->alamat ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>