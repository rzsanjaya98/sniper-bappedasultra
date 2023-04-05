<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $page_name ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_name ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- alert  -->
    <?php
    if ($this->session->flashdata('info')) {
        if ($this->session->flashdata('info')['from']) {
            echo "
          <div class=' alert alert-success alert-dismissible'>
          <h4><i class='icon fa fa-globe'></i> Information!</h4>" .
                $this->session->flashdata('info')["message"] .
                "</div>
          ";
        } else {
            echo "
          <div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-ban'></i> Alert!</h4>" .
                $this->session->flashdata('info')["message"] .
                "</div>
          ";
        }
    }
    ?>
    <!-- alert  -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profil</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/admin/dist/img/admin avatar.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $user[0]->user_profile_fullname; ?></h3>

                            <p class="text-muted text-center">
                                <?php
                                if ($user[0]->user_level == 1) {
                                    echo "Admin Utama";
                                } else if ($user[0]->user_level == 2) {
                                    echo "Admin";
                                } else {
                                    echo "Admin OPD";
                                }
                                ?>
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>E-Mail</b> <a class="float-right"><?php echo $user[0]->user_profile_email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Instansi</b> <a class="float-right"><?php if ($user[0]->user_profile_opd == "") {
                                                                                echo "-";
                                                                            } else {
                                                                                echo $user[0]->user_profile_opd;
                                                                            } ?></a>
                                </li>
                            </ul>

                            <a href="<?php echo site_url('admin/profil/update_profil') ?>" class="btn btn-info btn-block"><b>Update Profil</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
</div>