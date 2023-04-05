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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profil</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <?php echo form_open("admin/profil/update_profil"); ?>
                                    <?php foreach ($user as $data) { ?>
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="user_profile_fullname" placeholder="Nama Lengkap" value="<?php echo $data->user_profile_fullname ?>">
                                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="user_profile_email" placeholder="E-Mail" value="<?php echo $data->user_profile_email ?>">
                                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_profile_email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="user_username" placeholder="Username" value="<?php echo $data->user_username ?>" readonly>
                                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_username'); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="user_password" id="password" placeholder="Password Baru">
                                                    <input type="checkbox" id="checkbox_pw">Show Password</label>
                                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('user_password'); ?></span>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" name="user_id" value="<?php echo $data->user_id ?>" hidden only>
                                            <input type="number" class="form-control" name="user_status" value="<?php echo $data->user_status ?>" hidden only>
                                            <input type="text" class="form-control" name="user_level" value="<?php echo $data->user_level ?>" hidden only>
                                            <!-- <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div> -->

                                            <!-- <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
</div>