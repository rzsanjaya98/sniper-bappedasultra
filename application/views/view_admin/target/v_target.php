<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-app bg-success" href="<?php echo site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan; ?>">
                        <i class="fas fa-chevron-left"></i>Sub Kegiatan</a>
                    <h1><?php echo 'Target ' . $page_name; ?></h1>
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
                            <h3 class="card-title"><?php echo $id_jenis_urusan . '. ' . $id_bidang_urusan . '. ' . $id_program . '. ' . $id_kegiatan . '. ' . $id_sub_kegiatan . '. ' . $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?php echo site_url('admin/program_sultra/input_target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan; ?>" class="btn-sm btn-primary">Input Target</a>
                            <br><br>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Sub Kegiatan</th>
                                        <th>Target (Kinerja)</th>
                                        <th>Target (Rp.)</th>
                                        <th>Tahun</th>
                                        <!-- <th>Kategori</th> -->
                                        <th colspan="2" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1;
                                    $no = 1;
                                    foreach ($target as $data) :

                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $page_name ?></td>
                                            <td><?php echo $data->target_kinerja ?></td>
                                            <td><?php echo "Rp " . number_format($data->target_anggaran, 2, ',', '.'); ?></td>
                                            <td><?php echo $data->target_tahun ?></td>
                                            <!-- <td><?php echo $file->kategori ?></td> -->
                                            <td style="width: 30px;">
                                                <a href="<?php echo site_url('admin/program_sultra/update_target/') . $data->id_opd . '/' . $data->id_jenis_urusan . '/' . $data->id_bidang_urusan . '/' . $data->id_program . '/' . $data->id_kegiatan . '/' . $data->id_sub_kegiatan . '/' . $data->target_tahun; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td style="width: 30px;">
                                                <a href="<?php echo site_url('admin/program_sultra/delete_target/') . $data->id_opd . '/' . $data->id_jenis_urusan . '/' . $data->id_bidang_urusan . '/' . $data->id_program . '/' . $data->id_kegiatan . '/' . $data->id_sub_kegiatan . '/' . $data->target_tahun; ?>" onclick=" return confirm('Apa Anda Yakin Menghapus Target tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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