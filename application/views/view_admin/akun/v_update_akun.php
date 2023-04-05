<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $page_name ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_name ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($this->session->flashdata('register')) {
        echo "
        <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4><i class='icon fa fa-ban'></i> Alert!</h4>" .
            $this->session->flashdata('register') .
            "</div>
        ";
    } else {
        // echo"
        // <div class='alert alert-info alert-dismissible'>
        //   Regiter new membership
        // </div>
        // ";
    }
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form <?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open("admin/akun/update_akun"); ?>
                        <?php foreach ($user as $data) { ?>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="user_profile_fullname" placeholder="Nama Lengkap" value="<?php echo $data->user_profile_fullname ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>E-Mail</label>
                                        <input type="email" class="form-control" name="user_profile_email" placeholder="E-Mail" value="<?php echo $data->user_profile_email ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_email'); ?></span>
                                    </div>
                                    <?php if($data->user_level == 3){ ?>
                                    <div class="form-group">
                                        <label>Instansi/OPD</label>
                                        <select name="user_profile_opd" class="form-control">
                                            <?php foreach ($instansi_opd as $opd) : ?>
                                                <option value="<?php echo $opd->id_instansi_opd ?>" <?php if($data->user_profile_id_opd == "$opd->id_instansi_opd") echo 'selected'; ?>><?php echo $opd->nama_instansi_opd ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_opd'); ?></span>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="user_username" placeholder="Username" value="<?php echo $data->user_username ?>" readonly>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_username'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" name="user_password" placeholder="Password" value="<?php echo set_value('user_password'); ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>User Level</label>
                                        <select name="level" class="form-control" disabled>
                                            <option value="2" <?php if ($data->user_level == 2) echo "selected"; ?>>Admin</option>
                                            <option value="3" <?php if ($data->user_level == 3) echo "selected"; ?>>Admin OPD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>User Status</label>
                                        <select name="user_status" class="form-control">
                                            <?php
                                            if ($data->user_status == 1) {
                                                echo "<option value='1' selected>Aktif</option><option value='0'>Non-Aktif</option>";
                                            } else if ($data->user_status == 0) {
                                                echo "<option value='1'>Aktif</option><option value='0' selected>Non-Aktif</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <input type="number" class="form-control" name="user_id" value="<?php echo $data->user_id ?>" hidden only>
                                    <input type="text" class="form-control" name="user_level" value="<?php echo $data->user_level ?>" hidden only>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <!-- /.card -->
    </section>

</div>