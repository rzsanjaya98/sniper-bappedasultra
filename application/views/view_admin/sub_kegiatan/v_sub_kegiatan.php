<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a class="btn btn-app bg-success" href="<?php echo site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program; ?>">
            <i class="fas fa-chevron-left"></i>Kegiatan</a>
          <h1><?php echo $page_name; ?></h1>
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $id_jenis_urusan . '. ' . $id_bidang_urusan . '. ' . $id_program . '. ' . $id_kegiatan . '. ' . $page_name ?></h3>
              <br>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?php echo site_url('admin/program_sultra/input_sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan; ?>" class="btn-sm btn-primary">Input Sub Kegiatan</a>
              <br><br>
              <table class="table table-bordered table-striped" style="font-size: 12px; text-align: center ;">
                <thead>
                  <tr>
                    <th style="width: 10px" rowspan="2">No</th>
                    <th rowspan="2">Nama Sub Kegiatan</th>
                    <th rowspan="2">Indikator Sub Kegiatan</th>
                    <th rowspan="2">Satuan</th>
                    <th colspan="2">Target Kinerja RPJMD & Renstra PD Tahun 2023 </th>
                    <!-- <th colspan="2">Capaian Kinerja s/d Tahun 2020</th> -->
                    <th rowspan="2" colspan="4" style="text-align: center;">Aksi</th>
                  </tr>
                  <tr>
                    <th>Kinerja</th>
                    <th>Rp.</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1;
                  $no = 1;
                  $total = 0;
                  foreach ($sub_kegiatan as $file) :
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $file->id_sub_kegiatan . ' - ' . $file->nama_sub_kegiatan ?></td>
                      <td><?php echo $file->indikator_sub_kegiatan ?></td>
                      <td><?php echo $file->satuan ?></td>
                      <td><?php echo $file->target_kinerja ?></td>
                      <td><?php echo "Rp " . number_format($file->target_anggaran, 2, ',', '.'); ?></td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/update_sub_kegiatan/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $file->id_kegiatan . '/' . $file->id_sub_kegiatan; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      </td>
                      <td style="width: 30px;">
                        <a href="<?php echo site_url('admin/program_sultra/delete_sub_kegiatan/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $file->id_kegiatan . '/' . $file->id_sub_kegiatan; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Sub Kegiatan tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                      <td style="width: 80px;">
                        <a href="<?php echo site_url('admin/program_sultra/target/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $file->id_kegiatan . '/' . $file->id_sub_kegiatan; ?>" class="btn-sm btn-dark">Target</a>
                      </td>
                      <td style="width: 90px;">
                        <a href="<?php echo site_url('admin/program_sultra/capaian/') . $file->id_opd . '/' . $file->id_jenis_urusan . '/' . $file->id_bidang_urusan . '/' . $file->id_program . '/' . $file->id_kegiatan . '/' . $file->id_sub_kegiatan; ?>" class="btn-sm btn-info">Capaian</a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                    $total = $total + $file->target_anggaran;
                  endforeach; ?>
                  <tr>
                    <td colspan="5">Jumlah</td>
                    <td><?php echo "Rp " . number_format($total, 2, ',', '.'); ?></td>
                  </tr>
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