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
                           <th> ID Aktivitas </th>
                            <th> Jenis Komponen</th>
                            <th> Nama Komponen</th>
                            <th> Nama Suplier</th>
                            <th> Komponen Keluar </th>
                            <th> Komponen Masuk</th>
                            <th> Nama Produk</th>
                            <th> Tanggal Aktivitas</th>
                            <th> Nota Beli</th>
                            <th> Status</th>
                            <th> Keterangan</th>
                            

                        </tr>
        
            <?php
            $no = 1;
            foreach ($data as $laporan_stok)
            {
             ?>
                <tr>
              <td> <?php echo $no++ ?></td>
              <td><?php echo $laporan_stok->id_aktivitas ?></td>
              <td><?php echo $laporan_stok->jenis_komponen ?></td>
              <td><?php echo $laporan_stok->nama_komponen ?></td>
              <td><?php echo $laporan_stok->nama_suplier ?></td>
              <td><?php echo $laporan_stok->komponen_keluar ?></td>
              <td><?php echo $laporan_stok->komponen_masuk ?></td>
              <td><?php echo $laporan_stok->nama_produk ?></td>
              <td><?php echo $laporan_stok->tgl_aktivitas ?></td>
              <td><?php echo $laporan_stok->nota ?></td>
              <td><?php echo $laporan_stok->status ?></td>
              <td><?php echo $laporan_stok->keterangan ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>