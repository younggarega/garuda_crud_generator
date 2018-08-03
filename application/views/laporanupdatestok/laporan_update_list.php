<!-- Main content -->
<div class="content-wrapper">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-warning box-solid'>
                <div class='box-header'>
                  <h3 class='box-title'>LAPORAN STOK &nbsp</h3>
                </div>

                      <div class='box-body'>
                        <div style="padding-bottom: 10px;"'>
                        <?php echo anchor(site_url('laporanupdatestok/excel'), ' <i class="fa fa-file-excel-o"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                          <?php echo anchor(site_url('laporanupdatestok/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                          <?php echo anchor(site_url('laporanupdatestok/pdf'), '<i class="btn btn-danger btn-sm "> Export To PDF</i>',array('target'=>'_blank')); ?>
                          <?php echo anchor(site_url('laporanupdatestok/'), ' <i class="fa fa-refresh"></i> ', 'class="btn btn-primary btn-sm"'); ?>
                        </div>
                
                <table class='table table-bordered table-striped' id="mytable">
                    <thead>
                        <tr>
                           <th width="10">  ID Aktivitas </th>
                           <th width="10">  Nama Suplier </th>
                           <th width="10">  Nama Kategori </th>
                           <th width="10">  Nama Komponen </th>
                           <th width="10">  Jumlah Komponen </th>
                           <th width="20"> Tanggal </th>
                            <th width="20"> Nota Beli</th>
                            <th width="20"> Keterangan</th>

                            

                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no = 0;
                       foreach ($laporan_update_data as $laporanupdate){
                        ?>
                        <tr>
                        <td> <?php echo $laporanupdate->id_aktivitas ?> </td>
                        <td> <?php echo $laporanupdate->nama_suplier ?> </td>
                        <td> <?php echo $laporanupdate->nama_kategori ?> </td>
                        <td> <?php echo $laporanupdate->nama_komponen ?> </td>
                        <td align="center"> <?php echo $laporanupdate->jml_komponen ?> </td>
                        <td> <?php echo $laporanupdate->tanggal ?> </td>
                        <td> <?php echo $laporanupdate->nota_beli ?> </td>
                        <td> <?php echo $laporanupdate->keterangan ?> </td>
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
      //       $(document).ready(function(){ 
      //        // get_data(); 
      //        $("mytable").dataTable();  
            
      // });
        //     function get_data(){
        //     $.ajax({
        //         type  : 'ajax',
        //         url   : '<?php echo base_url()?>index.php/LaporanStok/getall',
        //         method : "POST",
        //         async : false,
        //         dataType : 'json',
        //         success : function(all){
        //             var table = '';
        //             var i;
        //             var no = 1;
        //             for (i=0; i<all.length; i++){
        //                table += '<tr>'+
        //                '<td>'+ no++ +'</td>'+
        //                '<td>'+ all[i].nama_kategori+'</td>'+
        //                '<td>'+ all[i].id_produk+'</td>'+
        //                '<td>'+ all[i].nama_produk+'</td>'+
        //                '<td>'+ all[i].jumlah_unit+'</td>'+
        //                '</tr>';
        //             }
        //             $('#tablear').html(table);
        //         }
        //     });
        // }

        </script>