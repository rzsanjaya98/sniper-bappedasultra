<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $page_name_top; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Admin</a></li>
            <li class="breadcrumb-item active"><?php echo substr($page_name, 0, 25) . '...' ?></li>
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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $id_jenis_urusan . '. ' . $id_bidang_urusan . '. ' . $id_program . '. ' . $page_name ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?php echo site_url('admin/program_sultra/input_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program; ?>" class="btn-sm btn-primary">Input Kegiatan</a>
              <br><br>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Kegiatan</th>
                    <th>Indikator Kegiatan</th>
                    <!-- <th>Kategori</th> -->
                    <th colspan="3" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1;
                  $no = 1;
                  foreach ($kegiatan as $file) :
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $file->id_kegiatan.' - '.$file->nama_kegiatan ?></td>
                      <td><?php echo $file->indikator_kegiatan ?></td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/update_kegiatan/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program. '/' . $file->id_kegiatan; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      </td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/delete_kegiatan/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program. '/' . $file->id_kegiatan; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Kegiatan tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                      <td style="width: 155px;">
                        <a href="<?php echo site_url('admin/program_sultra/sub_kegiatan/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program. '/' . $file->id_kegiatan; ?>" class="btn-sm btn-info">Detail Sub Kegiatan</a>
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