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
        <h2>Laporan Stok</h2>
        <table class="word-table" style="margin-bottom: 10px">
         <tr>
                            <th>  ID Aktivitas </th>
                           <th>  Nama Suplier </th>
                           <th>  Nama Kategori </th>
                           <th>  Nama Komponen </th>
                           <th>  Jumlah Komponen </th>
                           <th> Tanggal </th>
                            <th> Nota Beli</th>
                            <th> Keterangan</th>
                            

                        </tr>
        
            <?php
            $no = 1;
            foreach ($data as $laporan_update)
            {
             ?>
                <tr>
                        <td> <?php echo $laporan_update->id_aktivitas ?> </td>
                        <td> <?php echo $laporan_update->nama_suplier ?> </td>
                        <td> <?php echo $laporan_update->nama_kategori ?> </td>
                        <td> <?php echo $laporan_update->nama_komponen ?> </td>
                        <td align="center"> <?php echo $laporan_update->jml_komponen ?> </td>
                        <td> <?php echo $laporan_update->tanggal ?> </td>
                        <td> <?php echo $laporan_update->nota_beli ?> </td>
                        <td> <?php echo $laporan_update->keterangan ?> </td>    
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>