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
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form <?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open("admin/program_sultra/input_capaian/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan/$id_sub_kegiatan"); ?>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Capaian Kinerja</label>
                                            <input type="text" class="form-control" name="capaian_kinerja" placeholder="Capaian Kinerja" value="<?php echo set_value('capaian_kinerja'); ?>">
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_kinerja'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Capaian Anggaran</label>
                                            <input type="text" class="form-control" name="capaian_anggaran" placeholder="Capaian Anggaran" value="<?php echo set_value('capaian_anggaran'); ?>">
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_anggaran'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Periode Capaian</label>
                                            <select name="capaian_periode" class="form-control">
                                                <option value=""></option>
                                                <option value="T1">Triwulan 1</option>
                                                <option value="T2">Triwulan 2</option>
                                                <option value="T3">Triwulan 3</option>
                                                <option value="T4">Triwulan 4</option>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_periode'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Tahun Capaian</label>
                                            <select name="capaian_tahun" class="form-control">
                                                <option value=""></option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('capaian_tahun'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_program" value="<?php echo $id_program; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_sub_kegiatan" value="<?php echo $id_sub_kegiatan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_opd" value="<?php echo $id_opd; ?>" hidden only>
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