<div class="content-wrapper">
    <section class="content">


        <div class="row">
            <div class="col-xs-12">
                <div class="caption">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">MASTER SUPLIER</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;"'>
                            <?php echo anchor(site_url('mastersuplier/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                            <?php echo anchor(site_url('mastersuplier/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                            <?php echo anchor(site_url('mastersuplier/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Suplier</th>
                                    <th>Nama Suplier</th>
                                    <th>Alamat</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($mastersuplier_data as $mastersuplier)
                                    {
                                        ?>
                                        <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $mastersuplier->id_suplier ?></td>
                                    <td><?php echo $mastersuplier->nama_suplier ?></td>
                                    <td><?php  echo $mastersuplier->alamat?></td>

                                    <td style="text-align:center" width="140px">
                                    <?php 
                                    echo anchor(site_url('mastersuplier/read/'.$mastersuplier->id_suplier),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
                                    echo '  '; 
                                    echo anchor(site_url('mastersuplier/update/'.$mastersuplier->id_suplier),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm')); 
                                    echo '  '; 
                                    echo anchor(site_url('mastersuplier/delete/'.$mastersuplier->id_suplier),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    ?>
                                    </td>
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
                        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                                <script type="text/javascript">
                            $(function() {
                            $('#id_produk').keyup(function() {
                                this.value = this.value.toUpperCase();
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
