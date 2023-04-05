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
                        <?php echo form_open("admin/indikator_makro/update_data_makro_regional/$provinsi_nasional/$tahun"); ?>
                        <?php foreach ($indikator_makro as $im) { ?>
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Provinsi/Nasional</label>
                                                <select name="provinsinasional" class="form-control" disabled>
                                                    <option></option>
                                                    <option value="INDONESIA">INDONESIA</option>
                                                    <?php foreach ($provinsi as $prov) { ?>
                                                        <option value="<?php echo $prov->provinsi_nasional ?>" <?php if ($im->provinsi_nasional == $prov->provinsi_nasional) echo "selected" ?>><?php echo $prov->provinsi_nasional; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('provinsi_nasional'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select name="thn" class="form-control" disabled>
                                                    <option></option>
                                                    <option value="2020" <?php if ($im->tahun == 2020) echo "selected" ?>>2020</option>
                                                    <option value="2021" <?php if ($im->tahun == 2021) echo "selected" ?>>2021</option>
                                                    <option value="2022" <?php if ($im->tahun == 2022) echo "selected" ?>>2022</option>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('tahun'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pertumbuhan Ekonomi</label>
                                        <input type="text" class="form-control" name="pertumbuhan_ekonomi" placeholder="Contoh : -0.90" value="<?php echo $im->data_pertumbuhan_ekonomi; ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('pertumbuhan_ekonomi'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Gini Rasio</label>
                                        <input type="text" class="form-control" name="gini_rasio" placeholder="Contoh : 0.390" value="<?php echo $im->data_gini_rasio; ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('gini_rasio'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Persentase Penduduk Miskin</label>
                                        <input type="text" class="form-control" name="persentase_penduduk_miskin" placeholder="Contoh : 10.24" value="<?php echo $im->data_persentase_penduduk_miskin; ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('persentase_penduduk_miskin'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Indeks Pembangunan Manusia</label>
                                        <input type="text" class="form-control" name="indeks_pembangunan_manusia" placeholder="Contoh : 80.76" value="<?php echo $im->data_indeks_pembangunan_manusia; ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indeks_pembangunan_manusia'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tingkat Pengangguran Terbuka</label>
                                        <input type="text" class="form-control" name="tingkat_pengangguran_terbuka" placeholder="Contoh : 5.30" value="<?php echo $im->data_tingkat_pengangguran_terbuka; ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('tingkat_pengangguran_terbuka'); ?></span>
                                    </div>
                                </div>
                                <input type="hidden" name="provinsi_nasional" value="<?php echo $provinsi_nasional; ?>">
                                <input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
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