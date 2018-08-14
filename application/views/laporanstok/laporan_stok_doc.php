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
                           <th>  No </th>
                           <th> kategori Komponen </th>
                            <th> ID Komponen</th>
                            <th> Nama Komponen</th>
                            <th> Jumlah Komponen</th>
                            

                        </tr>
        
            <?php
            $no = 1;
            foreach ($data as $laporan_stok)
            {
             ?>
                <tr>
              <td> <?php echo $no++ ?></td>
              <td><?php echo $laporan_stok->nama_kategori ?></td>
              <td><?php echo $laporan_stok->id_komponen ?></td>
              <td><?php echo $laporan_stok->nama_komponen ?></td>
              <td><?php echo $laporan_stok->jml_komponen ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>