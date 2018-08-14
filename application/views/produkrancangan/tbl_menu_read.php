  <!-- Main content -->
  <div class="content-wrapper">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Produk Rancangan Read</h3>
        <table class="table table-bordered">

          <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Komponen</th>
                                    <th>Jumlah Komponen</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($read_data as $read)
                                    {
                                        ?>
                                        <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $read->id_produk ?></td>
                                    <td><?php echo $read->nama_produk ?></td>
                                    <td><?php  echo $read->nama_komponen?></td>
                                    <td><?php  echo $read->jml_komponen?></td>
                                    <td><a href="<?php echo site_url('produkrancangan') ?>" class="btn btn-default">Cancel</a></td>
                                                            
                                    </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>

      <!-- <tr><td>Id Produk</td><td><?php echo $id_produk; ?></td></tr>
        <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
        <tr><td>Nama Komponen</td><td><?php echo $id_komponen; ?></td></tr>
        <tr><td>Jumlah Komponen</td><td><?php echo $jml_komponen; ?></td></tr>
        <tr><td>Nama Komponen</td><td><?php echo $id_komponen; ?></td></tr>
        <tr><td>Jumlah Komponen</td><td><?php echo $jml_komponen; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('produkrancangan') ?>" class="btn btn-default">Cancel</a></td></tr> -->
    </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div>