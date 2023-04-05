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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $page_name ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?php echo site_url('admin/program_sultra/input_program'); ?>" class="btn-sm btn-primary">Input Data</a>
              <br><br>
              <div class="col-md-8 offset-md-2">
                <div class="input-group">
                  <input type="search" id="myInput" class="form-control form-control-lg" placeholder="Type your keywords here">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
              <br>
              <!-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                  </div>
                </div>
              </div> -->
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px; text-align: center;">No</th>
                    <th style="text-align: center;">Jenis Urusan</th>
                    <th style="text-align: center;">Bidang Urusan</th>
                    <th style="text-align: center;">Nama Program</th>
                    <th style="text-align: center;">Indikator Program</th>
                    <?php if ($this->session->userdata('user_level') != 3) { ?>
                      <th style="text-align: center;">OPD</th>
                    <?php } ?>
                    <th style="text-align: center;">Kategori</th>
                    <th colspan="3" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  <?php
                  // $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1;
                  $no = 1;
                  foreach ($program_sultra as $file) :
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php foreach ($jenis_urusan as $ju) {
                            if ($file->id_jenis_urusan == $ju->id_jenis_urusan) {
                              echo $ju->id_jenis_urusan . ' - ' . $ju->jenis_urusan;
                            }
                          } ?></td>
                      <td><?php foreach ($bidang_urusan as $bu) {
                            if ($file->id_jenis_urusan == $bu->id_jenis_urusan && $file->id_bidang_urusan == $bu->id_bidang_urusan) {
                              echo $bu->id_bidang_urusan . ' - ' . $bu->bidang_urusan;
                            }
                          } ?></td>
                      <td><?php echo $file->id_program . ' - ' . $file->nama_program ?></td>
                      <td><?php echo $file->indikator_program ?></td>
                      <?php if ($this->session->userdata('user_level') != 3) { ?>
                        <td><?php echo $file->opd_penanggung_jawab ?></td>
                      <?php } ?>
                      <td><?php echo $file->kategori ?></td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/update_program/') . $file->id_opd . "/" . $file->id_jenis_urusan . "/" . $file->id_bidang_urusan . "/" . $file->id_program; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      </td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/delete_program/') . $file->id_opd . "/" . $file->id_jenis_urusan . "/" . $file->id_bidang_urusan . "/" . $file->id_program; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Program tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                      <td style="width: 135px;">
                        <a href="<?php echo site_url('admin/program_sultra/kegiatan/') . $file->id_opd . "/" . $file->id_jenis_urusan . "/" . $file->id_bidang_urusan . "/" . $file->id_program; ?>" class="btn-sm btn-info">Detail Kegiatan</a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <!-- <ul class="pagination pagination-sm m-0 float-right"> -->
              <!-- <?php echo $pagination; ?> -->
              <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
              <!-- </ul> -->
            </div>
          </div>
          <!-- /.card -->
  </section>
</div>
<!-- <div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Danger Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div> -->
<!-- </div> -->
<!-- /.modal-content -->
<!-- </div> -->
<!-- /.modal-dialog -->
<!-- </div> -->
<!-- /.modal -->