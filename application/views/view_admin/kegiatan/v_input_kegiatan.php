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
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form <?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open("admin/program_sultra/input_kegiatan/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program"); ?>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Kegiatan</label>
                                    <input type="text" class="form-control" name="kode_kegiatan" placeholder="Kode Kegiatan" value="<?php echo set_value('kode_kegiatan'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_kegiatan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo set_value('nama_kegiatan'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_kegiatan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Kegiatan</label>
                                    <input type="text" class="form-control" name="indikator_kegiatan" placeholder="Indikator Kegiatan" value="<?php echo set_value('indikator_kegiatan'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_kegiatan'); ?></span>
                                </div>
                                <input type="hidden" class="form-control" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_program" value="<?php echo $id_program; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_opd" value="<?php echo $id_opd; ?>" hidden only>
                                <!-- <input type="hidden" class="form-control" name="opd_penanggung_jawab" value="<?php echo $id_program; ?>" hidden only>
                                <?php echo $opd_penanggung_jawab; ?> -->
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