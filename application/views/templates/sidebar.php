      <?php

        $menus = array(
            array(
                'menuId' => "home",
                'menuName' => "Beranda",
                // 'menuPath' => site_url("home"),
                'menuPath' => site_url("admin/home"),
                'menuIcon' => "fa fa-tachometer-alt"
            ),

            // array(
            //     'menuId' => "instansi_opd",
            //     'menuName' => "Instansi/OPD",
            //     'menuPath' => site_url("admin/instansi_opd"),
            //     'menuIcon' => 'fa fa-building'
            // ),

            // array(
            //     'menuId' => "urusan_pemerintahan",
            //     'menuName' => "Urusan Pemerintahan",
            //     'menuPath' => site_url("admin/urusan_pemerintahan"),
            //     'menuIcon' => 'fa fa-building'
            // ),

            array(
                'menuId' => "program_sultra",
                'menuName' => "Program Sultra",
                'menuPath' => site_url("admin/program_sultra"),
                'menuIcon' => 'fa fa-server'
            ),

            // array(
            //     'menuId' => "map",
            //     'menuName' => "MAP",
            //     'menuPath' => site_url("admin/map"),
            //     'menuIcon' => 'fa fa-map'
            // ),

            array(
                'menuId' => "capaian_kinerja_opd",
                'menuName' => "Capaian Kinerja OPD",
                'menuPath' => site_url("admin/capaian_kinerja_opd"),
                'menuIcon' => 'fa fa-cogs'
            )

            // array(
            //   'menuId' => "data_uji",
            //   'menuName' => "Data Uji",
            //   'menuPath' => site_url("admin/data_uji"),
            //   'menuIcon' => 'fa fa-server'
            // )
        );

        $indikator =
            array(
                'menuId' => "indikator_makro",
                'menuName' => "Indikator Makro",
                'menuPath' => site_url("admin/indikator_makro"),
                'menuIcon' => 'fa fa-book'
            );

        $admin = array(
            'menuId' => "akun",
            'menuName' => "Akun",
            'menuPath' => site_url("admin/akun"),
            'menuIcon' => 'fa fa-users'
        );

        $opd = array(
            'menuId' => "instansi_opd",
            'menuName' => "Instansi/OPD",
            'menuPath' => site_url("admin/instansi_opd"),
            'menuIcon' => 'fa fa-building'
        );

        if ($this->session->userdata('user_level') == 1) {
            
            array_push($menus, $indikator);
            array_push($menus, $opd);
            array_push($menus, $admin);
            // array_push($menus, $category) ;
            // array_push($menus, $log) ;
        }
        ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <?php
                foreach ($menus as $menu) :
                ?>
                  <li class="nav-item" id="<?php echo $menu['menuId'] ?>">
                      <a href="<?php echo $menu['menuPath'] ?>" class="nav-link">
                          <i class="nav-icon <?php echo $menu['menuIcon'] ?>"></i>
                          <p>
                              <?php echo $menu['menuName'] ?>
                          </p>
                      </a>
                  </li>
              <?php
                endforeach;
                ?>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
      </aside>
      <script type="text/javascript">
          function menuActive(id) {
              // var a =document.getElementById("menu").children[num-1].className="active";
              if (id == "")
                  var a = document.getElementById("home").className = "nav-link active";
              else
                  var a = document.getElementById(id).className = "nav-link active";
              console.log(a);
          }
      </script>