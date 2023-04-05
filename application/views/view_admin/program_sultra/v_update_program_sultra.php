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
                        <?php echo form_open("admin/program_sultra/update_program/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program"); ?>
                        <?php foreach ($program_sultra as $file) { ?>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Jenis Urusan</label>
                                        <input type="hidden" name="id_jenis_urusan" value="<?php echo $file->id_jenis_urusan ?>">
                                        <select name="jenis_urusan" class="form-control" disabled>
                                            <option></option>
                                            <?php foreach ($jenis_urusan as $jenis_urusan) { ?>
                                                <option value="<?php echo $jenis_urusan->id_jenis_urusan; ?>" <?php if ($file->id_jenis_urusan == $jenis_urusan->id_jenis_urusan) echo 'selected';  ?>><?php echo $jenis_urusan->id_jenis_urusan . " - " . $jenis_urusan->jenis_urusan ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kategori'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Bidang Urusan</label>
                                        <input type="hidden" name="id_bidang_urusan" value="<?php echo $file->id_bidang_urusan ?>">
                                        <select name="bidang_urusan" class="form-control" disabled>
                                            <option></option>
                                            <?php foreach ($bidang_urusan as $bidang_urusan) { ?>
                                                <option value="<?php echo $bidang_urusan->id_bidang_urusan; ?>" <?php if ($file->id_jenis_urusan == $bidang_urusan->id_jenis_urusan && $file->id_bidang_urusan == $bidang_urusan->id_bidang_urusan) echo "selected";  ?>><?php echo $bidang_urusan->id_bidang_urusan . " - " . $bidang_urusan->bidang_urusan ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kategori'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Program</label>
                                        <input type="text" class="form-control" name="kode_program" placeholder="Kode Program" value="<?php echo $file->id_program ?>" readonly>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_program'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Program</label>
                                        <input type="text" class="form-control" name="nama_program" placeholder="Nama Program" value="<?php echo $file->nama_program ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_program'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Indikator Program</label>
                                        <input type="text" class="form-control" name="indikator_program" placeholder="Indikator Program" value="<?php echo $file->indikator_program ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_program'); ?></span>
                                    </div>
                                    <?php if ($this->session->userdata('user_level') == 3) { ?>
                                        <input type="text" class="form-control" name="opd" placeholder="OPD Penanggung Jawab" value="<?php echo $file->id_opd ?>" hidden>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label>OPD Penanggung Jawab</label>
                                            <select name="opd" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($instansi_opd as $opd) : ?>
                                                    <option value="<?php echo $opd->id_instansi_opd ?>" <?php if ($file->id_opd == $opd->id_instansi_opd) echo "selected"; ?>><?php echo $opd->nama_instansi_opd ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('opd'); ?></span>
                                        </div>
                                    <?php } ?>
                                    <!-- <input type="text" class="form-control" name="opd" placeholder="OPD Penanggung Jawab" value="<?php echo set_value('opd'); ?>"> -->

                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <option></option>
                                            <?php foreach ($kategori as $kategori) { ?>
                                                <option value="<?php echo $kategori->nama_kategori; ?>" <?php if ($file->kategori == $kategori->nama_kategori) echo "selected"; ?>><?php echo $kategori->nama_kategori ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kategori'); ?></span>
                                    </div>
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