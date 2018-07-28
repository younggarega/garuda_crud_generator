<!-- Main content -->
<div class="content-wrapper">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-warning box-solid'>
                <div class='box-header'> <h3 class='box-title'>LAPORAN RETUR BARANG</h3>  
                  </div>
                      
                      <div class='box-body'>
                        <div style="padding-bottom: 10px;"'>
                          <?php echo anchor(site_url('Laporanretur/excel'), ' <i class="fa fa-file-excel-o"></i> Export To Excel', 'class="btn btn-primary btn-sm"'); ?>
                          <?php echo anchor(site_url('Laporanretur/word'), '<i class="fa fa-file-word-o"></i> Export To Word', 'class="btn btn-success btn-sm"'); ?>
                          <?php echo anchor(site_url('Laporanretur/pdf'), '<i class="btn btn-danger btn-sm">Export To PDF</i>',array('target'=>'_blank')); ?>
                           <?php echo anchor(site_url('Laporanretur/'), ' <i class="fa fa-refresh"></i> ', 'class="btn btn-primary btn-sm"'); ?>
                  </div>
              
                <table class='table table-bordered table-striped' id="mytable">
                    <thead>
                        <tr>
                           <th width="10">  No </th>
                           <th width="20"> ID Aktivitas </th>
                           <th width="20"> Nama Suplier </th>
                           <th width="20"> Nama Kategori </th>
                            <th width="20"> ID Komponen</th>
                            <th width="30"> Nama Komponen</th>
                            <th width="20"> Jumlah komponen</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no = 0;
                       foreach ($laporan_retur_data as $laporan_retur){
                        ?>
                        <tr>
                        <td> <?php echo ++$no ?> </td>
                        <td> <?php echo $laporan_stok->id_aktivitas ?> </td>
                        <td> <?php echo $laporan_stok->nama_suplier ?> </td>
                        <td> <?php echo $laporan_stok->nama_kategori ?> </td>
                        <td> <?php echo $laporan_stok->id_komponen ?> </td>
                        <td> <?php echo $laporan_stok->nama_komponen ?> </td>
                        <td align="center"> <?php echo $laporan_stok->jumlah_komponen ?> </td>
                      </tr>
                        <?php
                       }
                       ?>
                    </tbody>

                </table>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>

    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
        
        <script type="text/javascript">
            $(document).ready(function(){   
               $("").dataTable();
            get_data(); 
      });

            function del(){
            $('.del').on('click',function(event){

                event.preventDefault();

                var notif = confirm("Apakah anda yakin menghapus data ?")
                if(notif){

                let idtrans = $(this).attr('idtrans');
               // console.log(idtrans)
            
            $.ajax({
                type: 'POST',
                data: {id :idtrans},
                url: '<?php echo base_url()?>index.php/Laporanretur/delete',
                success: function(result) {
                       get_data()
                        }
            });
                }
            return false;
        }) }
        </script>
 <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tabel").dataTable();
            });
        </script> -->