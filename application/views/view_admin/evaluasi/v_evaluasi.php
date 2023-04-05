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
                            <!-- <div class="col-md-8 offset-md-2">
                                <div class="input-group">
                                    <input type="search" id="myInput" class="form-control form-control-lg" placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br> -->
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th style="width: 10px; text-align: center;">No</th> -->
                                        <th colspan="3" style="text-align: center;">Program / Kegiatan / Sub Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    // $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1;
                                    $no = 1;
                                    foreach ($program as $file) :
                                    ?>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <!-- <td><?php echo $no ?></td> -->
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                <?php echo $file->id_program . ' - ' . $file->nama_program ?>
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td>
                                                <div class="p-0">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <?php foreach ($kegiatan as $k) :
                                                                if ($k->id_jenis_urusan == $file->id_jenis_urusan && $k->id_bidang_urusan == $file->id_bidang_urusan && $k->id_program == $file->id_program) {
                                                            ?>
                                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                                        <td>
                                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                            <?php echo $k->id_kegiatan . ' - ' . $k->nama_kegiatan; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="expandable-body">
                                                                        <td>
                                                                            <div class="p-0">
                                                                                <table class="table table-bordered table-striped">
                                                                                    <tbody>
                                                                                        <?php foreach ($sub_kegiatan as $sk) :
                                                                                            if ($sk->id_jenis_urusan == $file->id_jenis_urusan && $sk->id_bidang_urusan == $file->id_bidang_urusan && $sk->id_program == $file->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                        ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $sk->id_sub_kegiatan . ' - ' . $sk->nama_sub_kegiatan; ?></td>
                                                                                                    <td style="width: 90px;">
                                                                                                        <a href="<?php echo site_url('admin/program_sultra/capaian/') . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $k->id_kegiatan . '/' . $sk->id_sub_kegiatan; ?>" class="btn-sm btn-info">Capaian</a>
                                                                                                    </td>
                                                                                                    <td style="width: 80px;">
                                                                                                        <a href="<?php echo site_url('admin/program_sultra/target/') . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $k->id_kegiatan . '/' . $sk->id_sub_kegiatan; ?>" class="btn-sm btn-dark">Target</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                        <?php }
                                                                                        endforeach; ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            <?php }
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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