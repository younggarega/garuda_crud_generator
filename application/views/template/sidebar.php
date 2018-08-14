<section class="sidebar">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
       
        
        <?php
        // chek settingan tampilan menu
        $setting = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
        if($setting['value']=='ya'){
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "SELECT * 
            FROM tbl_menu 
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
        }else{
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
        }

        $main_menu = $this->db->order_by("no_urut","asc");
        $main_menu = $this->db->get_where('tbl_menu', array('is_main_menu' =>0, 'is_aktif'=>'y'));
        
        foreach ($main_menu->result() as $m){
            // chek is have sub menu

            $submenu = $this->db->order_by("no_urut","asc");
            $submenu = $this->db->get_where('tbl_menu',array('is_main_menu'=>$m->id_menu,'is_aktif'=>'y'));

            if($submenu->num_rows()>0){
                // display sub menu
                echo "<li class='treeview'>
                        <a href='#'>
                            <i class='$m->icon'></i> <span>".strtoupper($m->title)."</span>
                            <span class='pull-right-container'>
                                <i class='fa fa-angle-left pull-right'></i>
                            </span>
                        </a>
                        <ul class='treeview-menu' style='display: none;'>";
                        foreach ($submenu->result() as $sub){
                            echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".strtoupper($sub->title))."</li>"; 
                        }
                        echo" </ul>
                    </li>";
            }else{
                // display main menu
                echo "<li>";
                echo anchor($m->url,"<i class='".$m->icon."'></i> ".strtoupper($m->title));
                echo "</li>";
            }
        }
        ?>
        <li><?php echo anchor('auth/logout',"<i class='fa fa-sign-out'></i> LOGOUT");?></li>
    </ul>
</section>
<!-- /.sidebar -->