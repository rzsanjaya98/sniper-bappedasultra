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
                        <?php echo form_open("admin/program_sultra/input_program"); ?>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Urusan</label>
                                    <select name="jenis_urusan" id="jenis_urusan" class="form-control">
                                        <option></option>
                                        <!-- <option value="X">- Tidak Ada -</option> -->
                                        <?php foreach ($jenis_urusan as $jenis_urusan) { ?>
                                            <option value="<?php echo $jenis_urusan->id_jenis_urusan ?>"><?php echo $jenis_urusan->id_jenis_urusan . " - " . $jenis_urusan->jenis_urusan ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('jenis_urusan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Bidang Urusan</label>
                                    <select name="bidang_urusan" id="bidang_urusan" class="form-control">
                                        <option></option>
                                        <?php foreach ($bidang_urusan as $bidang_urusan) { ?>
                                            <option value="<?php echo $bidang_urusan->id_bidang_urusan ?>"><?php echo $bidang_urusan->id_bidang_urusan . " - " . $bidang_urusan->bidang_urusan ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('bidang_urusan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Kode Program</label>
                                    <input type="text" class="form-control" name="kode_program" placeholder="Kode Program" value="<?php echo set_value('kode_program'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_program'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nama Program</label>
                                    <input type="text" class="form-control" name="nama_program" placeholder="Nama Program" value="<?php echo set_value('nama_program'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_program'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Program</label>
                                    <input type="text" class="form-control" name="indikator_program" placeholder="Indikator Program" value="<?php echo set_value('indikator_program'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_program'); ?></span>
                                </div>
                                <?php if ($this->session->userdata('user_level') == 3) { ?>
                                    <input type="text" class="form-control" name="opd" placeholder="OPD Penanggung Jawab" value="<?php echo $user[0]->user_profile_id_opd; ?>" hidden>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label>OPD Penanggung Jawab</label>
                                        <select name="opd" class="form-control" <?php  ?>>
                                            <option value=""></option>
                                            <?php foreach ($instansi_opd as $opd) : ?>
                                                <option value="<?php echo $opd->id_instansi_opd; ?>"><?php echo $opd->nama_instansi_opd; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('opd'); ?></span>
                                    </div>
                                <?php } ?>
                                <!-- <input type="text" class="form-control" name="opd" placeholder="OPD Penanggung Jawab" value="<?php echo set_value('opd'); ?>"> -->

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control ">
                                        <option></option>
                                        <?php foreach ($kategori as $kategori) { ?>
                                            <option value="<?php echo $kategori->nama_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
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
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#jenis_urusan').change(function() {
            var id = $('#jenis_urusan').val();
            // console.log(id);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/program_sultra/getBidangUrusan/') ?>" + id,
                // data: {
                //     id: id
                // },
                async: true,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    var html = '';
                    var i;
                    for (i = 0; i < response.length; i++) {
                        html += '<option value=' + response[i].id_bidang_urusan + '>' + response[i].id_bidang_urusan + " - " + response[i].bidang_urusan + '</option>';
                    }
                    $('#bidang_urusan').html(html);

                }
            });
            return false;
        });
    });
</script>