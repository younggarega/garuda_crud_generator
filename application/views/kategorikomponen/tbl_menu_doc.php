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
        <h2>Tabel Kategori Komponen</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Komponen</th>
		<th>Nama Kategori</th>
		<th>Keterangan</th>
		
            </tr><?php
            $no = 1;
            foreach ($kategorikomponen_data as $kategorikomponen)
            {
                ?>
                <tr>
		      <td><?php echo $no++ ?></td>
		      <td><?php echo $kategorikomponen->jenis_komponen ?></td>
		      <td><?php echo $kategorikomponen->nama_kategori ?></td>
		      <td><?php echo $kategorikomponen->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>