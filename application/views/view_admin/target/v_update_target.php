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
                        <?php echo form_open("admin/program_sultra/update_target/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan/$id_sub_kegiatan/$target_tahun"); ?>
                        <?php foreach ($target as $file) { ?>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Target Kinerja</label>
                                                <input type="text" class="form-control" name="target_kinerja" placeholder="Target Kinerja" value="<?php echo $file->target_kinerja; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_kinerja'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Target Anggaran</label>
                                                <input type="text" class="form-control" name="target_anggaran" placeholder="Target Anggaran" value="<?php echo $file->target_anggaran; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_anggaran'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Tahun Target</label>
                                                <select name="target" class="form-control" disabled>
                                                    <option value="<?php echo $file->target_tahun; ?>" selected><?php echo $file->target_tahun ?></option>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_tahun'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_program" value="<?php echo $id_program; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_sub_kegiatan" value="<?php echo $id_sub_kegiatan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_opd" value="<?php echo $id_opd; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="target_tahun" value="<?php echo $file->target_tahun; ?>" hidden only>
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