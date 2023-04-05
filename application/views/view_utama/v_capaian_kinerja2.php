<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/jqvmap/jqvmap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <title><?php echo $page_name; ?></title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>assets/admin/dist/img/sultra.png" alt="Bappeda Sultra" height="60" width="60">
        </div>

        <section class="content">
        <div class="container-fluid" style="overflow-x: scroll;">
                <div class="card-header">
                    <?php echo form_open("capaian_kinerja/"); ?>
                    <div class="row col-md-6">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="opd" id="opd" class="form-control">
                                    <option>- Pilih OPD -</option>
                                    <?php foreach ($instansi_opd as $instansi_opd) { ?>
                                        <option value="<?php echo $instansi_opd->id_instansi_opd ?>" <?php if ($instansi == $instansi_opd->id_instansi_opd) echo 'selected';  ?>><?php echo $instansi_opd->nama_instansi_opd; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php if ($jenis_urusan != null && $bidang_urusan != null && $program != null && $kegiatan != null && $sub_kegiatan != null) { ?>
                <div class="card-body">
                    <!-- <a href="<?php echo site_url('admin/capaian_kinerja_opd/export_pdf'); ?>" class="btn-sm btn-danger" target="_blank">Export to PDF</a> -->
                    <!-- <a href="<?php echo site_url('admin/capaian_kinerja_opd/export_excel/').$instansi; ?>" class="btn-sm btn-info" target="_blank">Export to Excel</a> -->
                    <!-- <h3 class="card-title" align="center" style="margin-left:auto;margin-right:auto"> -->
                    <!-- <div class="row">
                                <img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70">
                                <p>Badan Perencanaan Pembangunan Daerah</p>
                                <p> Provinsi Sulawesi Tenggara</p>
                            </div> -->
                    <!-- </h3> -->
                </div>

                <table style="font-family:verdana; font-size:160%;  margin-left:auto;margin-right:auto; text-align: center; ">
                    <tr>
                        <td rowspan='2'><img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70"></td>
                        <td style="padding-left: 10px;">Badan Perencanaan Pembangunan Daerah</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Provinsi Sulawesi Tenggara</td>
                    </tr>
                </table>
                <table class="table table-bordered" style="font-family: Arial;">
                    <thead style="font-size: 12px; text-align: center; background-color: #A2D5F2;">
                        <tr>
                            <th rowspan="2" colspan="5">Kode</th>
                            <th rowspan="3" style="vertical-align: middle;">Jenis Urusan / Bidang Urusan / Program / Kegiatan / Sub Kegiatan</th>
                            <th rowspan="3" style="vertical-align: middle;">Indikator Kinerja Program (Outcome)/ Kegiatan (Output)/ Sub Kegiatan (Sub Output)</th>
                            <th rowspan="3" style="vertical-align: middle;">Satuan</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja dan Anggaran RPJMD & Renstra PD Tahun 2023 </th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2021</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja dan Anggaran Tahun 2022</th>
                            <th colspan="8" style="vertical-align: middle;">Capaian Kinerja dan Realisasi Anggaran Tahun 2022</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2022</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Tingkat Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2022 (%)</th>
                            <th rowspan="3" style="vertical-align: middle;">OPD Penanggung Jawab</th>
                        </tr>
                        <tr>
                            <th colspan="2" style="font-size: 8px;">Triwulan 1</th>
                            <th colspan="2" style="font-size: 8px;">Triwulan 2</th>
                            <th colspan="2" style="font-size: 8px;">Triwulan 3</th>
                            <th colspan="2" style="font-size: 8px;">Triwulan 4</th>
                        </tr>
                        <tr>
                            <th style="font-size: 8px;">Jenis Urusan</th>
                            <th style="font-size: 8px;">Bidang Urusan</th>
                            <th style="font-size: 8px;">Program</th>
                            <th style="font-size: 8px;">Kegiatan</th>
                            <th style="font-size: 8px;">Sub Kegiatan</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                            <th style="font-size: 8px;">Kinerja</th>
                            <th style="font-size: 8px;">Rp.</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="background-color: #6C737E;">1</th>
                            <th style="background-color: #6C737E;">2</th>
                            <th style="background-color: #6C737E;">3</th>
                            <th style="background-color: #6C737E;">4</th>
                            <th colspan="2" style="background-color: #6C737E;">5</th>
                            <th colspan="2" style="background-color: #6C737E;">6</th>
                            <th colspan="2" style="background-color: #6C737E;">7</th>
                            <th colspan="8" style="background-color: #6C737E;">8</th>
                            <th colspan="2" style="background-color: #6C737E;">9 (6+8)</th>
                            <th colspan="2" style="background-color: #6C737E;">10 (9/5*100)</th>
                            <th colspan="2" style="background-color: #6C737E;">11</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        <?php
                        // $no = 1;
                        foreach ($jenis_urusan as $ju) :
                        ?>
                            <tr style="background-color: #86C1D4;">
                                <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold; font-size: 16px;"><?php echo $ju->jenis_urusan; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            foreach ($bidang_urusan as $bu) :
                                if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                            ?>
                                    <tr style="background-color: #5A92AF;">
                                        <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                                                echo $bu->id_bidang_urusan;
                                            }
                                            ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight: bold; font-size: 14px">
                                            <?php
                                            if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                                                echo $bu->bidang_urusan;
                                            }
                                            ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    foreach ($program as $p) :
                                        if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                    ?>
                                            <tr style="background-color: #07689F;">
                                                <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo $p->id_bidang_urusan;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo $p->id_program;
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-weight: bold; font-size: 12px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo $p->nama_program;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo $p->indikator_program;
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->ta_rpjmd, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->ca2021, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->tka2022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->cat12022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->cat22022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->cat32022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo "Rp " . number_format($p->cat42022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 11px;">
                                                    <?php
                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                        echo $p->opd_penanggung_jawab;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <?php
                                            foreach ($kegiatan as $k) :
                                                if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                            ?>
                                                    <tr class="table-secondary">
                                                        <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                                        <td style="text-align: center;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                echo $k->id_bidang_urusan;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo $k->id_program;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo $k->id_kegiatan;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td style="font-weight: bold; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo $k->nama_kegiatan;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo $k->indikator_kegiatan;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->ta_rpjmd, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->ca2021, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;"></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->tka2022, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->cat12022, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                        </td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->cat22022, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->cat32022, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                echo "Rp " . number_format($k->cat42022, 2, ',', '.');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;">
                                                            <?php
                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                echo $p->opd_penanggung_jawab;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                    foreach ($sub_kegiatan as $sk) :
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                    ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                                                <td style="text-align: center;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                        echo $sk->id_bidang_urusan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program) {
                                                                        echo $sk->id_program;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program) {
                                                                        echo $sk->id_kegiatan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->id_sub_kegiatan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->nama_sub_kegiatan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->indikator_sub_kegiatan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->satuan;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->target_kinerja;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->target_anggaran, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->ck2021;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->ca2021, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->tk2022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->tka2022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->ckt12022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->cat12022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->ckt22022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->cat22022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->ckt32022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->cat32022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo $sk->ckt42022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        echo "Rp " . number_format($sk->cat42022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        // echo $sk->ck_2022;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        // echo "Rp " . number_format($sk->ca_2022, 2, ',', '.');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                        // echo (($sk->ck_2022 / $sk->target_kinerja) * 100) . "%";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td style="font-style: italic; font-size: 11px;">
                                                                    <?php
                                                                    if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                        echo $p->opd_penanggung_jawab;
                                                                    }
                                                                    ?>
                                                                </td>

                                                            </tr>
                                    <?php }
                                                    endforeach;
                                                }
                                            endforeach;
                                        }
                                    endforeach; ?>
                                <?php } ?>


                        <?php
                            // $no++;
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>

        </div>
    </section>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <!-- <script src="<?php echo base_url(); ?>assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <!-- <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> -->
</body>

</html>