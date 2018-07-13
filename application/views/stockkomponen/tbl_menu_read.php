<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_menu Read</h2>
        <table class="table">
	    <tr><td>ID Komponen</td><td><?php echo $id_komponen; ?></td></tr>
	    <tr><td>Nama Komponen</td><td><?php echo $nama_komponen; ?></td></tr>
	    <tr><td>Jenis Komponen</td><td><?php echo $jenis_komponen; ?></td></tr>
	    <tr><td>Stock</td><td><?php echo $stock_komponen; ?></td></tr>
	    <tr><td>Gambar Komponen</td><td><?php echo $gambar_komponen; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stockkomponen') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>