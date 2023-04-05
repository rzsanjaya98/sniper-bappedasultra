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
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $page_name ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?php echo site_url('admin/instansi_opd/input_instansi_opd'); ?>" class="btn-sm btn-primary">Input Data</a>
              <br><br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Instansi/OPD</th>
                    <th colspan="2" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($instansi_opd as $file) :
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $file->nama_instansi_opd ?></td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/instansi_opd/update_instansi_opd/') . $file->id_instansi_opd; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      </td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/instansi_opd/delete_instansi_opd/') . $file->id_instansi_opd; ?>" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div> -->
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