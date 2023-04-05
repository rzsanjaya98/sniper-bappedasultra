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
                        <?php echo form_open("admin/indikator_makro/input_data_makro_regional"); ?>
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Provinsi/Nasional</label>
                                            <select name="provinsi_nasional" class="form-control">
                                                <option></option>
                                                <option value="INDONESIA">INDONESIA</option>
                                                <?php foreach ($provinsi as $prov) { ?>
                                                    <option value="<?php echo $prov->provinsi_nasional ?>"><?php echo $prov->provinsi_nasional; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('provinsi_nasional'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <option></option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('tahun'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pertumbuhan Ekonomi</label>
                                    <input type="text" class="form-control" name="pertumbuhan_ekonomi" placeholder="Contoh : -0.90" value="<?php echo set_value('pertumbuhan_ekonomi'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('pertumbuhan_ekonomi'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Gini Rasio</label>
                                    <input type="text" class="form-control" name="gini_rasio" placeholder="Contoh : 0.390" value="<?php echo set_value('gini_rasio'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('gini_rasio'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Persentase Penduduk Miskin</label>
                                    <input type="text" class="form-control" name="persentase_penduduk_miskin" placeholder="Contoh : 10.24" value="<?php echo set_value('persentase_penduduk_miskin'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('persentase_penduduk_miskin'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Indeks Pembangunan Manusia</label>
                                    <input type="text" class="form-control" name="indeks_pembangunan_manusia" placeholder="Contoh : 80.76" value="<?php echo set_value('indeks_pembangunan_manusia'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indeks_pembangunan_manusia'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Pengangguran Terbuka</label>
                                    <input type="text" class="form-control" name="tingkat_pengangguran_terbuka" placeholder="Contoh : 5.30" value="<?php echo set_value('tingkat_pengangguran_terbuka'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('tingkat_pengangguran_terbuka'); ?></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </section>

</div>