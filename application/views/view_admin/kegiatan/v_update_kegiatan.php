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
                        <?php echo form_open("admin/program_sultra/update_kegiatan/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan"); ?>
                        <?php foreach ($kegiatan as $file) { ?>
                            <form>
                                <div class="card-body">
                                <div class="form-group">
                                        <label>Kode Kegiatan</label>
                                        <input type="text" class="form-control" name="kode_kegiatan" placeholder="Kode Kegiatan" value="<?php echo $file->id_kegiatan ?>" readonly>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_kegiatan'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo $file->nama_kegiatan ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_kegiatan'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Indikator Kegiatan</label>
                                        <input type="text" class="form-control" name="indikator_kegiatan" placeholder="Indikator Kegiatan" value="<?php echo $file->indikator_kegiatan ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_kegiatan'); ?></span>
                                    </div>
                                    <input type="hidden" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>">
                                    <input type="hidden" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>">
                                    <input type="hidden" name="id_program" value="<?php echo $id_program; ?>">
                                    <input type="hidden" name="id_opd" value="<?php echo $id_opd; ?>">
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