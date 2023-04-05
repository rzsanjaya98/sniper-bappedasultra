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
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form <?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open("admin/program_sultra/update_capaian/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan/$id_sub_kegiatan/$capaian_periode/$capaian_tahun"); ?>
                        <?php foreach ($capaian as $file) { ?>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Capaian Kinerja</label>
                                                <input type="text" class="form-control" name="capaian_kinerja" placeholder="Capaian Kinerja" value="<?php echo $file->capaian_kinerja; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_kinerja'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Capaian Anggaran</label>
                                                <input type="text" class="form-control" name="capaian_anggaran" placeholder="Capaian Anggaran" value="<?php echo $file->capaian_anggaran; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_anggaran'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Periode Capaian</label>
                                                <select name="periode" class="form-control" disabled>
                                                    <option value="<?php echo $file->capaian_periode; ?>" selected><?php echo $file->capaian_periode ?></option>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_periode'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Tahun Capaian</label>
                                                <select name="capaian" class="form-control" disabled>
                                                    <option value="<?php echo $file->capaian_tahun; ?>" selected><?php echo $file->capaian_tahun ?></option>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_tahun'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_program" value="<?php echo $id_program; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_opd" value="<?php echo $id_opd; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="id_sub_kegiatan" value="<?php echo $id_sub_kegiatan; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="capaian_periode" value="<?php echo $file->capaian_periode; ?>" hidden only>
                                    <input type="hidden" class="form-control" name="capaian_tahun" value="<?php echo $file->capaian_tahun; ?>" hidden only>
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