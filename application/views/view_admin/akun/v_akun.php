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
                            <a href="<?php echo site_url('admin/akun/register'); ?>" class="btn-sm btn-primary">Register Akun</a>
                            <br><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Akun</th>
                                        <th>E-Mail</th>
                                        <th>OPD</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th colspan="2" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_user as $data) :
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data->user_profile_fullname ?></td>
                                            <td><?php echo $data->user_profile_email ?></td>
                                            <td><?php echo $data->user_profile_opd ?></td>
                                            <td><?php echo $data->user_username ?></td>
                                            <td><?php
                                                if ($data->user_level == 2) {
                                                    echo "Admin";
                                                } else {
                                                    echo "Admin OPD";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($data->user_status == 1) {
                                                    echo "Aktif";
                                                } else {
                                                    echo "Non-Aktif";
                                                }
                                                ?>
                                            </td>
                                            <td style="width: 30px;">
                                                <a href="<?php echo site_url('admin/akun/update_akun/') . $data->user_id; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td style="width: 30px;">
                                                <a href="<?php echo site_url('admin/akun/delete_akun/') . $data->user_id; ?>" onclick="return confirm('Apa Anda Akan Menghapus Data ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                <!-- <a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $data->user_id;?>">Hapus</a> -->
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
<div class="modal fade" id="modalHapus<?php echo $data->user_id;?>">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <?php echo form_open("admin/akun/delete_akun/"); ?>
            <div class="modal-header">
                <h4 class="modal-title fa fa-trash">Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda akan menghapus akun <?php echo $data->user_profile_fullname; ?> ???</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Submit</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->