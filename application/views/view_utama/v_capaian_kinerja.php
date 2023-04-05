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
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title" align="center" style="margin-left:auto;margin-right:auto"> -->
                        <!-- <div class="row">
                                <img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70">
                                <p>Badan Perencanaan Pembangunan Daerah</p>
                                <p> Provinsi Sulawesi Tenggara</p>
                            </div> -->
                        <table style="font-family:verdana; font-size:160%;  margin-left:auto;margin-right:auto; text-align: center; ">
                            <tr>
                                <td rowspan='2'><img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70"></td>
                                <td style="padding-left: 10px;">Badan Perencanaan Pembangunan Daerah</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">Provinsi Sulawesi Tenggara</td>
                            </tr>
                        </table>
                        <!-- </h3> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" style="font-family: Arial;">
                            <thead style="font-size: 12px; text-align: center; background-color: lightskyblue;">
                                <tr>
                                    <th colspan="5">Kode</th>
                                    <th rowspan="2" style="vertical-align: middle;">Jenis Urusan / Bidang Urusan / Program / Kegiatan / Sub Kegiatan</th>
                                    <th rowspan="2" style="vertical-align: middle;">Indikator Kinerja Program (Outcome)/ Kegiatan (Output)/ Sub Kegiatan (Sub Output)</th>
                                    <th rowspan="2" style="vertical-align: middle;">Satuan</th>
                                    <th rowspan="2" style="vertical-align: middle;">Target Kinerja RPJMD & Renstra PD Tahun 2023 </th>
                                    <th rowspan="2" style="vertical-align: middle;">Capaian Kinerja s/d Tahun 2020</th>
                                    <th rowspan="2" style="vertical-align: middle;">Target Kinerja Tahun 2021</th>
                                    <th rowspan="2" style="vertical-align: middle;">Capaian Kinerja Tahun 2021</th>
                                    <th rowspan="2" style="vertical-align: middle;">Capaian Kinerja s/d Tahun 2021</th>
                                    <th rowspan="2" style="vertical-align: middle;">Tingkat Capaian Kinerja s/d Tahun 2021 (%)</th>
                                    <th rowspan="2" style="vertical-align: middle;">OPD Penanggung Jawab</th>
                                </tr>
                                <tr>
                                    <th style="font-size: 8px;">Jenis Urusan</th>
                                    <th style="font-size: 8px;">Bidang Urusan</th>
                                    <th style="font-size: 8px;">Program</th>
                                    <th style="font-size: 8px;">Kegiatan</th>
                                    <th style="font-size: 8px;">Sub Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                <?php
                                // $no = 1;
                                foreach ($jenis_urusan as $ju) :
                                ?>
                                    <tr>
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
                                    </tr>
                                    <?php
                                    foreach ($bidang_urusan as $bu) :
                                        if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                                    ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $ju->id_jenis_urusan; ?></td>
                                                <td style="text-align: center;"><?php echo $bu->id_bidang_urusan; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-weight: bold; font-size: 14px"><?php echo $bu->bidang_urusan; ?></td>
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
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $p->id_jenis_urusan ?></td>
                                                        <td style="text-align: center;"><?php echo $p->id_bidang_urusan; ?> </td>
                                                        <td><?php echo $p->id_program; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="font-weight: bold; font-size: 12px;"><?php echo $p->nama_program; ?></td>
                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $p->indikator_program; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $p->opd_penanggung_jawab; ?></td>
                                                    </tr>

                                                    <?php
                                                    foreach ($kegiatan as $k) :
                                                        if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                    ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?php echo $k->id_jenis_urusan ?></td>
                                                                <td style="text-align: center;"><?php echo $k->id_bidang_urusan; ?></td>
                                                                <td><?php echo $k->id_program; ?></td>
                                                                <td><?php echo $k->id_kegiatan; ?></td>
                                                                <td></td>
                                                                <td style="font-weight: bold; font-size: 11px;"><?php echo $k->nama_kegiatan; ?></td>
                                                                <td style="font-style: italic; font-size: 11px;"><?php echo $k->indikator_kegiatan; ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="font-style: italic; font-size: 11px;"><?php echo $p->opd_penanggung_jawab; ?></td>
                                                            </tr>

                                                            <?php
                                                            foreach ($sub_kegiatan as $sk) :
                                                                if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            ?>
                                                                    <tr>
                                                                        <td style="text-align: center;"><?php echo $sk->id_jenis_urusan ?></td>
                                                                        <td style="text-align: center;"><?php echo $sk->id_bidang_urusan;?></td>
                                                                        <td><?php echo $sk->id_program;?></td>
                                                                        <td><?php echo $sk->id_kegiatan;?></td>
                                                                        <td><?php echo $sk->id_sub_kegiatan;?></td>
                                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $sk->nama_sub_kegiatan; ?></td>
                                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $sk->indikator_sub_kegiatan;?></td>
                                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $sk->satuan;?></td>
                                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $sk->target_kinerja;?></td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            $ck2020 = 0;
                                                                            foreach ($capaian_2020 as $c_2020) {
                                                                                if ($c_2020->id_jenis_urusan == $ju->id_jenis_urusan && $c_2020->id_bidang_urusan == $bu->id_bidang_urusan && $c_2020->id_program == $p->id_program && $c_2020->id_kegiatan == $k->id_kegiatan && $c_2020->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo $c_2020->capaian_kinerja;
                                                                                    $ck2020 = $c_2020->capaian_kinerja;
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            foreach ($target_2021 as $t_2021) {
                                                                                if ($t_2021->id_jenis_urusan == $ju->id_jenis_urusan && $t_2021->id_bidang_urusan == $bu->id_bidang_urusan && $t_2021->id_program == $p->id_program && $t_2021->id_kegiatan == $k->id_kegiatan && $t_2021->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo $t_2021->target_kinerja;
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            $ck2021 = 0;
                                                                            foreach ($capaian_2021 as $c_2021) {
                                                                                if ($c_2021->id_jenis_urusan == $ju->id_jenis_urusan && $c_2021->id_bidang_urusan == $bu->id_bidang_urusan && $c_2021->id_program == $p->id_program && $c_2021->id_kegiatan == $k->id_kegiatan && $c_2021->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo $c_2021->capaian_kinerja;
                                                                                    $ck2021 = $c_2021->capaian_kinerja;
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        </td> -->
                                                                        <td style="font-style: italic; font-size: 11px;"><?php echo $ck2020 + $ck2021; ?></td>

                                                                        <td style="font-style: italic; font-size: 11px; <?php if ($sk->target_kinerja == 0 || empty($sk->target_kinerja)) {
                                                                                                                            echo 'background-color: red';
                                                                                                                        } else if (round((($ck2020 + $ck2021) / $sk->target_kinerja * 100)) < 35) {
                                                                                                                            echo 'background-color: red';
                                                                                                                        } else if (round((($ck2020 + $ck2021) / $sk->target_kinerja * 100)) > 35 && round((($ck2020 + $ck2021) / $sk->target_kinerja * 100)) < 75) {
                                                                                                                            echo 'background-color: yellow';
                                                                                                                        } else {
                                                                                                                            echo 'background-color: green';
                                                                                                                        } ?>"><?php if ($sk->target_kinerja == 0 || empty($sk->target_kinerja)) {
                                                                                                                                    echo '0%';
                                                                                                                                } else {
                                                                                                                                    echo round((($ck2020 + $ck2021) / $sk->target_kinerja * 100)) . '%';
                                                                                                                                } ?></td>
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
                    </div>
                </div>
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