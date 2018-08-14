<div class="content-wrapper">
    <section class="content">




        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA MENU</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;"'>
                            <?php echo anchor(site_url('kelolamenu/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                            <?php //echo anchor(site_url('kelolamenu/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                            <?php //echo anchor(site_url('kelolamenu/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Is Main Menu</th>
                                    <th>Is Aktif</th>
                                    <th>No Urut</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($kelolamenu_data as $kelolamenu)
                                {
                                    $aktif = $kelolamenu->is_aktif=='y'?'AKTIF':'TIDAK AKTIF';
                                    $main_menu = $kelolamenu->is_main_menu>1?'MAINMENU':'SUBMENU'
                                    ?>
                                    <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td><?php echo $kelolamenu->title ?></td>
                                        <td><?php echo $kelolamenu->url ?></td>
                                        <td><i class'<?php echo $kelolamenu->icon ?>'></td>
                                        <td><?php echo $aktif ?></td>
                                        <td><?php echo $main_menu ?></td>
                                        <td><?php echo $kelolamenu->no_urut ?></td>
                                        <td style="text-align:center" width="140">
                                        <?php 
                                        echo anchor(site_url('kelolamenu/read/'.$kelolamenu->id_menu), '<i class="fa fa-eye" ></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                                        echo '  ';
                                        echo anchor(site_url('kelolamenu/update/'.$kelolamenu->id_menu),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm')); 
                                        echo '  '; 
                                        echo anchor(site_url('kelolamenu/delete/'.$kelolamenu->id_menu),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                            $(document).ready(function (){
                                $("#mytable").dataTable();
                            });
</script>       
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
