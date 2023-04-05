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
                        <?php echo form_open("admin/akun/register"); ?>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="user_profile_fullname" placeholder="Nama Lengkap" value="<?php echo set_value('user_profile_fullname'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="user_profile_email" placeholder="E-Mail" value="<?php echo set_value('user_profile_email'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="user_username" placeholder="Username" value="<?php echo set_value('user_username'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="user_password" placeholder="Password" id="password" value="<?php echo set_value('user_password'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_password'); ?></span>
                                    <input type="checkbox" id="checkbox_pw">Show Password</label>
                                </div>
                                <div class="form-group">
                                    <label>User Level</label>
                                    <select name="user_level" class="form-control" id="user_level">
                                        <option value="2">Admin</option>
                                        <option value="3">Admin OPD</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="user_username" placeholder="Username"> -->
                                    <!-- <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_username'); ?></span> -->
                                </div>
                                <div class="form-group">
                                    <label>OPD</label>
                                    <select name="user_profile_opd" class="form-control" id="user_profile_opd" disabled>
                                        <option value=""></option>
                                        <?php foreach ($instansi_opd as $opd) : ?>
                                            <option value="<?php echo $opd->id_instansi_opd ?>"><?php echo $opd->nama_instansi_opd ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="user_username" placeholder="Username"> -->
                                    <!-- <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_username'); ?></span> -->
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
    </section>

</div>
