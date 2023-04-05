<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php echo $page_name ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active">
                            <?php echo $page_name ?>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="overflow-x: scroll;">
            <?php if ($user[0]->user_level != 3) { ?>
                    <div class="card-header">
                        <?php echo form_open("admin/capaian_kinerja_opd/"); ?>
                        <div class="row col-md-6">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="opd" id="opd" class="form-control">
                                        <option>- Pilih OPD -</option>
                                        <?php foreach ($instansi_opd as $instansi_opd) { ?>
                                                <option value="<?php echo $instansi_opd->id_instansi_opd ?>" <?php if ($instansi == $instansi_opd->id_instansi_opd)
                                                       echo 'selected'; ?>><?php echo $instansi_opd->nama_instansi_opd; ?></option>
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
            <?php } ?>
            <?php if ($jenis_urusan != null && $bidang_urusan != null && $program != null && $kegiatan != null && $sub_kegiatan != null) { ?>
                    <div class="card-body">
                        <!-- <a href="<?php echo site_url('admin/capaian_kinerja_opd/export_pdf'); ?>" class="btn-sm btn-danger" target="_blank">Export to PDF</a> -->
                        <a href="<?php echo site_url('admin/capaian_kinerja_opd/export_excel/') . $instansi; ?>"
                            class="btn-sm btn-info" target="_blank">Export to Excel</a>
                        <!-- <h3 class="card-title" align="center" style="margin-left:auto;margin-right:auto"> -->
                        <!-- <div class="row">
                                        <img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70">
                                        <p>Badan Perencanaan Pembangunan Daerah</p>
                                        <p> Provinsi Sulawesi Tenggara</p>
                                    </div> -->
                        <!-- </h3> -->
                    </div>

                    <table
                        style="font-family:verdana; font-size:160%;  margin-left:auto;margin-right:auto; text-align: center; ">
                        <tr>
                            <td rowspan='2'><img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70"
                                    height="70"></td>
                            <td style="padding-left: 10px;">Badan Perencanaan Pembangunan Daerah</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 10px;">Provinsi Sulawesi Tenggara</td>
                        </tr>
                    </table>
                    <table class="table table-bordered" style="font-family: Arial;">
                        <thead style="font-size: 12px; text-align: center; background-color: #5bc0de;">
                            <tr>
                                <th rowspan="2" colspan="5">Kode</th>
                                <th rowspan="3" style="vertical-align: middle;">Jenis Urusan / Bidang Urusan / Program /
                                    Kegiatan / Sub Kegiatan</th>
                                <th rowspan="3" style="vertical-align: middle;">Indikator Kinerja Program (Outcome)/ Kegiatan
                                    (Output)/ Sub Kegiatan (Sub Output)</th>
                                <th rowspan="3" style="vertical-align: middle;">Satuan</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja dan Anggaran RPJMD &
                                    Renstra PD Tahun 2023 </th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja dan Realisasi
                                    Anggaran s/d Tahun 2021</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja dan Anggaran Tahun
                                    2022</th>
                                <th colspan="8" style="vertical-align: middle;">Capaian Kinerja dan Realisasi Anggaran Tahun
                                    2022 (Triwulan)</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja dan Realisasi Anggaran Tahun
                                    2022 (Total)</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja dan Realisasi
                                    Anggaran s/d Tahun 2022</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Tingkat Capaian Kinerja dan
                                    Realisasi Anggaran s/d Tahun 2022 (%)</th>
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
                                <th style="font-size: 8px;">Kinerja</th>
                                <th style="font-size: 8px;">Rp.</th>
                            </tr>
                            <tr class="bg-dark">
                                <th colspan="5">1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th colspan="2">5</th>
                                <th colspan="2">6</th>
                                <th colspan="2">7</th>
                                <th colspan="8">8</th>
                                <th colspan="2">9</th>
                                <th colspan="2">10 (6+9)</th>
                                <th colspan="2">11 (10/5*100)</th>
                                <th colspan="2">12</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            <?php
                            // $no = 1;
                            foreach ($jenis_urusan as $ju):
                                ?>
                                    <tr style="background-color: #FFB9B9;">
                                        <td style="text-align: center;">
                                            <?php echo $ju->id_jenis_urusan ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight: bold; font-size: 16px;">
                                            <?php echo $ju->jenis_urusan; ?>
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php foreach ($bidang_urusan as $bu):
                                        if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                                            ?>
                                                    <tr style="background-color: #FFDDD2;">
                                                        <td style="text-align: center;">
                                                            <?php echo $ju->id_jenis_urusan ?>
                                                        </td>
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
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                    foreach ($program as $p):
                                                        $total_kinerja = 0;
                                                        $total_anggaran = 0;
                                                        if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                            ?>
                                                                    <tr style="font-weight: bold; font-size: 12px;">
                                                                        <td style="text-align: center;">
                                                                            <?php echo $ju->id_jenis_urusan ?>
                                                                        </td>
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
                                                                        <td>Persen</td>
                                                                        <td>100</td>
                                                                        <!-- <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            // if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                            //     echo $p->tk_rpjmd;
                                                                            // }
                                                                            ?>
                                                                        </td> -->
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->ta_rpjmd, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                // echo $p->ck2021;
                                                                                if ($p->ck2021 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($p->ck2021 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format(($p->ck2021 / $p->tk_rpjmd) * 100, 2);
                                                                                    }else{
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                }else{
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->ca2021, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                // echo $p->tkk2022;
                                                                                if ($p->tkk2022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($p->tkk2022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format(($p->tkk2022 / $p->tk_rpjmd) * 100, 2);
                                                                                    }else{
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                }else{
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->tka2022, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($p->ckt12022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    // echo $p->ckt12022;
                                                                                    if ($p->ckt12022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        // echo $p->ckt12022;
                                                                                        echo number_format(($p->ckt12022/$p->tk_rpjmd)*100, 2);
                                                                                        $total_kinerja = $total_kinerja + $p->ckt12022;
                                                                                    } else {
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->cat12022, 2, ',', '.');
                                                                                $total_anggaran = $total_anggaran + $p->cat12022;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($p->ckt22022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($p->ckt22022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format(($p->ckt22022/$p->tk_rpjmd)*100, 2);
                                                                                        $total_kinerja = $total_kinerja + $p->ckt22022;
                                                                                    } else {
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->cat22022, 2, ',', '.');
                                                                                $total_anggaran = $total_anggaran + $p->cat22022;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($p->ckt32022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($p->ckt32022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format(($p->ckt32022/$p->tk_rpjmd)*100, 2);
                                                                                        $total_kinerja = $total_kinerja + $p->ckt32022;
                                                                                    } else {
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->cat32022, 2, ',', '.');
                                                                                $total_anggaran = $total_anggaran + $p->cat32022;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($p->ckt42022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    // echo $p->ckt42022;
                                                                                    if($p->ckt42022 != 0 && $p->tk_rpjmd != 0){
                                                                                        echo number_format(($p->ckt42022/$p->tk_rpjmd)*100, 2);
                                                                                        $total_kinerja = $total_kinerja + $p->ckt42022;
                                                                                    }else{
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($p->cat42022, 2, ',', '.');
                                                                                $total_anggaran = $total_anggaran + $p->cat42022;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($p->tk_rpjmd != NULL) {
                                                                                    if($p->tk_rpjmd != 0){
                                                                                        echo number_format(($total_kinerja/$p->tk_rpjmd)*100, 2);
                                                                                    }else{
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                echo "Rp " . number_format($total_anggaran, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                $ckrak2022 = $total_kinerja + $p->ck2021;
                                                                                if ($ckrak2022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($ckrak2022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format(($ckrak2022 / $p->tk_rpjmd) * 100, 2);
                                                                                    }else{
                                                                                        echo number_format(0, 2);
                                                                                    }
                                                                                }else{
                                                                                    echo number_format(0, 2);
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                $ckraa2022 = $total_anggaran + $p->ca2021;
                                                                                echo "Rp " . number_format($ckraa2022, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <?php
                                                                            if($ckrak2022 != NULL && $p->tk_rpjmd != NULL){
                                                                                if($ckrak2022 != 0 && $p->tk_rpjmd != 0){
                                                                                    if ((($ckrak2022 / $p->tk_rpjmd) * 100) >= 91 && (($ckrak2022 / $p->tk_rpjmd) * 100) <= 100) {
                                                                                        $color = "#0275d8";
                                                                                    } else if ((($ckrak2022 / $p->tk_rpjmd) * 100) >= 76 && (($ckrak2022 / $p->tk_rpjmd) * 100) < 91) {
                                                                                        $color = "#5cb85c";
                                                                                    } else if ((($ckrak2022 / $p->tk_rpjmd) * 100) >= 66 && (($ckrak2022 / $p->tk_rpjmd) * 100) < 76) {
                                                                                        $color = "#F7FF93";
                                                                                    } else if ((($ckrak2022 / $p->tk_rpjmd) * 100) >= 51 && (($ckrak2022 / $p->tk_rpjmd) * 100) < 66) {
                                                                                        $color = "#f0ad4e";
                                                                                    } else {
                                                                                        $color = "#d9534f";
                                                                                    } 
                                                                                }else{
                                                                                    $color = "#d9534f";
                                                                                }
                                                                            }else{
                                                                                $color = "#d9534f";
                                                                            }
                                                                        ?>
                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($ckrak2022 != NULL && $p->tk_rpjmd != NULL) {
                                                                                    if ($ckrak2022 != 0 && $p->tk_rpjmd != 0) {
                                                                                        echo number_format((($ckrak2022 / $p->tk_rpjmd) * 100), 2) . "%";
                                                                                    }else{
                                                                                        echo number_format(0, 2) . "%";
                                                                                    }
                                                                                } else {
                                                                                    echo number_format(0, 2) . "%";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <?php
                                                                            if($ckraa2022 != NULL && $p->ta_rpjmd != NULL){
                                                                                if($ckraa2022 != 0 && $p->ta_rpjmd != 0){
                                                                                    if ((($ckraa2022 / $p->ta_rpjmd) * 100) >= 91 && (($ckraa2022 / $p->ta_rpjmd) * 100) <= 100) {
                                                                                        $color = "#0275d8";
                                                                                    } else if ((($ckraa2022 / $p->ta_rpjmd) * 100) >= 76 && (($ckraa2022 / $p->ta_rpjmd) * 100) < 91) {
                                                                                        $color = "#5cb85c";
                                                                                    } else if ((($ckraa2022 / $p->ta_rpjmd) * 100) >= 66 && (($ckraa2022 / $p->ta_rpjmd) * 100) < 76) {
                                                                                        $color = "#F7FF93";
                                                                                    } else if ((($ckraa2022 / $p->ta_rpjmd) * 100) >= 51 && (($ckraa2022 / $p->ta_rpjmd) * 100) < 66) {
                                                                                        $color = "#f0ad4e";
                                                                                    } else {
                                                                                        $color = "#d9534f";
                                                                                    }
                                                                                }else{
                                                                                    $color = "#d9534f";
                                                                                }
                                                                            }else{
                                                                                $color = "#d9534f";
                                                                            }
                                                                        ?>
                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                            <?php
                                                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                                if ($ckraa2022 != NULL && $p->ta_rpjmd != NULL) {
                                                                                    if ($ckraa2022 != 0 && $p->ta_rpjmd != 0) {
                                                                                        echo number_format((($ckraa2022 / $p->ta_rpjmd) * 100), 2) . "%";
                                                                                    }else{
                                                                                        echo number_format(0, 2) . "%";
                                                                                    }
                                                                                }else{
                                                                                    echo number_format(0, 2) . "%";
                                                                                }
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

                                                                    <?php
                                                                    foreach ($kegiatan as $k):
                                                                        $total_kinerja = 0;
                                                                        $total_anggaran = 0;
                                                                        if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                            ?>
                                                                                    <tr style="font-weight: bold; font-size: 11px;">
                                                                                        <td style="text-align: center;">
                                                                                            <?php echo $ju->id_jenis_urusan ?>
                                                                                        </td>
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
                                                                                        <td>Persen</td>
                                                                                        <td>100</td>
                                                                                        <!-- <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            // if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                            //     echo $k->tk_rpjmd;
                                                                                            // }
                                                                                            ?>
                                                                                        </td> -->
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->ta_rpjmd, 2, ',', '.');
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->ck2021 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    if ($k->ck2021 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        echo number_format(($k->ck2021 / $k->tk_rpjmd) * 100, 2);
                                                                                                    }else{
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                }else{
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->ca2021, 2, ',', '.');
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                // echo $k->tkk2022;
                                                                                                if ($k->tkk2022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    if ($k->tkk2022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        echo number_format(($k->tkk2022 / $k->tk_rpjmd) * 100, 2);
                                                                                                    }else{
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                }else{
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->tka2022, 2, ',', '.');
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->ckt12022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    // echo $k->ckt12022;
                                                                                                    if ($k->ckt12022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        // echo $k->ckt12022;
                                                                                                        echo number_format(($k->ckt12022/$k->tk_rpjmd)*100, 2);
                                                                                                        $total_kinerja = $total_kinerja + $k->ckt12022;
                                                                                                    } else {
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                } else {
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->cat12022, 2, ',', '.');
                                                                                                $total_anggaran = $total_anggaran + $k->cat12022;
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->ckt22022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    // echo $k->ckt22022;
                                                                                                    if ($k->ckt22022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        // echo $k->ckt22022;
                                                                                                        echo number_format(($k->ckt22022/$k->tk_rpjmd)*100, 2);
                                                                                                        $total_kinerja = $total_kinerja + $k->ckt22022;
                                                                                                    } else {
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                } else {
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->cat22022, 2, ',', '.');
                                                                                                $total_anggaran = $total_anggaran + $k->cat22022;
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->ckt32022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    // echo $k->ckt32022;
                                                                                                    if ($k->ckt32022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        // echo $k->ckt32022;
                                                                                                        echo number_format(($k->ckt32022/$k->tk_rpjmd)*100, 2);
                                                                                                        $total_kinerja = $total_kinerja + $k->ckt32022;
                                                                                                    } else {
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                } else {
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->cat32022, 2, ',', '.');
                                                                                                $total_anggaran = $total_anggaran + $k->cat32022;
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->ckt42022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    // echo $k->ckt42022;
                                                                                                    if ($k->ckt42022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        echo number_format(($k->ckt42022 / $k->tk_rpjmd) * 100, 2);
                                                                                                        $total_kinerja = $total_kinerja + $k->ckt42022;
                                                                                                    }else{
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                } else {
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($k->cat42022, 2, ',', '.');
                                                                                                $total_anggaran = $total_anggaran + $k->cat42022;
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($k->tk_rpjmd != NULL) {
                                                                                                    if ($k->tk_rpjmd != 0) {
                                                                                                        echo number_format(($total_kinerja / $k->tk_rpjmd) * 100, 2);
                                                                                                    }else{
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                } else {
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                echo "Rp " . number_format($total_anggaran, 2, ',', '.');
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                $ckrak2022 = $total_kinerja + $k->ck2021;
                                                                                                // echo $ckrak2022;
                                                                                                if ($ckrak2022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    if ($ckrak2022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        echo number_format(($ckrak2022 / $k->tk_rpjmd) * 100, 2);
                                                                                                    }else{
                                                                                                        echo number_format(0, 2);
                                                                                                    }
                                                                                                }else{
                                                                                                    echo number_format(0, 2);
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                $ckraa2022 = $total_anggaran + $k->ca2021;
                                                                                                echo "Rp " . number_format($ckraa2022, 2, ',', '.');
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <?php
                                                                                            if($ckrak2022 != NULL && $k->tk_rpjmd != NULL){
                                                                                                if($ckrak2022 != 0 && $k->tk_rpjmd != 0){
                                                                                                    if ((($ckrak2022 / $k->tk_rpjmd) * 100) >= 91 && (($ckrak2022 / $k->tk_rpjmd) * 100) <= 100) {
                                                                                                        $color = "#0275d8";
                                                                                                    } else if ((($ckrak2022 / $k->tk_rpjmd) * 100) >= 76 && (($ckrak2022 / $k->tk_rpjmd) * 100) < 91) {
                                                                                                        $color = "#5cb85c";
                                                                                                    } else if ((($ckrak2022 / $k->tk_rpjmd) * 100) >= 66 && (($ckrak2022 / $k->tk_rpjmd) * 100) < 76) {
                                                                                                        $color = "#F7FF93";
                                                                                                    } else if ((($ckrak2022 / $k->tk_rpjmd) * 100) >= 51 && (($ckrak2022 / $k->tk_rpjmd) * 100) < 66) {
                                                                                                        $color = "#f0ad4e";
                                                                                                    } else {
                                                                                                        $color = "#d9534f";
                                                                                                    }
                                                                                                }else{
                                                                                                    $color = "#d9534f";
                                                                                                }
                                                                                            }else{
                                                                                                $color = "#d9534f";
                                                                                            }
                                                                                        ?>
                                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if ($ckrak2022 != NULL && $k->tk_rpjmd != NULL) {
                                                                                                    if ($ckrak2022 != 0 && $k->tk_rpjmd != 0) {
                                                                                                        echo number_format((($ckrak2022 / $k->tk_rpjmd) * 100), 2) . "%";
                                                                                                    }else{
                                                                                                        echo number_format(0, 2) . "%";
                                                                                                    }
                                                                                                }else{
                                                                                                    echo number_format(0, 2) . "%";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                        <?php
                                                                                            if($ckraa2022 != NULL && $k->ta_rpjmd != NULL){
                                                                                                if($ckraa2022 != 0 && $k->ta_rpjmd != 0){
                                                                                                    if ((($ckraa2022 / $k->ta_rpjmd) * 100) >= 91 && (($ckraa2022 / $k->ta_rpjmd) * 100) <= 100) {
                                                                                                        $color = "#0275d8";
                                                                                                    } else if ((($ckraa2022 / $k->ta_rpjmd) * 100) >= 76 && (($ckraa2022 / $k->ta_rpjmd) * 100) < 91) {
                                                                                                        $color = "#5cb85c";
                                                                                                    } else if ((($ckraa2022 / $k->ta_rpjmd) * 100) >= 66 && (($ckraa2022 / $k->ta_rpjmd) * 100) < 76) {
                                                                                                        $color = "#F7FF93";
                                                                                                    } else if ((($ckraa2022 / $k->ta_rpjmd) * 100) >= 51 && (($ckraa2022 / $k->ta_rpjmd) * 100) < 66) {
                                                                                                        $color = "#f0ad4e";
                                                                                                    } else {
                                                                                                        $color = "#d9534f";
                                                                                                    }
                                                                                                }else{
                                                                                                    $color = "#d9534f";
                                                                                                }
                                                                                            }else{
                                                                                                $color = "#d9534f";
                                                                                            }
                                                                                        ?>
                                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                                            <?php
                                                                                            if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                                                if($ckraa2022 != NULL && $k->ta_rpjmd != NULL){
                                                                                                    if ($ckraa2022 != 0 && $k->ta_rpjmd != 0) {
                                                                                                        echo number_format((($ckraa2022 / $k->ta_rpjmd) * 100), 2) . "%";
                                                                                                    }else{
                                                                                                        echo number_format(0, 2) . "%";
                                                                                                    }
                                                                                                }else{
                                                                                                    echo number_format(0, 2) . "%";
                                                                                                }
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

                                                                                    <?php
                                                                                    foreach ($sub_kegiatan as $sk):
                                                                                        $total_kinerja = 0;
                                                                                        $total_anggaran = 0;
                                                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                            ?>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;">
                                                                                                            <?php echo $ju->id_jenis_urusan ?>
                                                                                                        </td>
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
                                                                                                                if ($sk->ck2021 != NULL) {
                                                                                                                    echo $sk->ck2021;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
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
                                                                                                                if ($sk->tk2022 != NULL) {
                                                                                                                    echo $sk->tk2022;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
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
                                                                                                                if ($sk->ckt12022 != NULL) {
                                                                                                                    echo $sk->ckt12022;
                                                                                                                    $total_kinerja = $total_kinerja + $sk->ckt12022;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo "Rp " . number_format($sk->cat12022, 2, ',', '.');
                                                                                                                $total_anggaran = $total_anggaran + $sk->cat12022;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                if ($sk->ckt22022 != NULL) {
                                                                                                                    echo $sk->ckt22022;
                                                                                                                    $total_kinerja = $total_kinerja + $sk->ckt22022;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo "Rp " . number_format($sk->cat22022, 2, ',', '.');
                                                                                                                $total_anggaran = $total_anggaran + $sk->cat22022;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                if ($sk->ckt32022 != NULL) {
                                                                                                                    echo $sk->ckt32022;
                                                                                                                    $total_kinerja = $total_kinerja + $sk->ckt32022;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo "Rp " . number_format($sk->cat32022, 2, ',', '.');
                                                                                                                $total_anggaran = $total_anggaran + $sk->cat32022;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                if ($sk->ckt42022 != NULL) {
                                                                                                                    echo $sk->ckt42022;
                                                                                                                    $total_kinerja = $total_kinerja + $sk->ckt42022;
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo "Rp " . number_format($sk->cat42022, 2, ',', '.');
                                                                                                                $total_anggaran = $total_anggaran + $sk->cat42022;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo $total_kinerja;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                echo "Rp " . number_format($total_anggaran, 2, ',', '.');
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                $ckrak2022 = $total_kinerja + $sk->ck2021;
                                                                                                                echo $ckrak2022;
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <td style="font-style: italic; font-size: 11px;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                $ckraa2022 = $total_anggaran + $sk->ca2021;
                                                                                                                echo "Rp " . number_format($ckraa2022, 2, ',', '.');
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <?php
                                                                                                        if($ckrak2022 != NULL && $sk->target_kinerja!= NULL){
                                                                                                            if($ckrak2022 != 0 && $sk->target_kinerja!= 0){
                                                                                                                if ((($ckrak2022 / $sk->target_kinerja) * 100) >= 91 && (($ckrak2022 / $sk->target_kinerja) * 100) <= 100) {
                                                                                                                    $color = "#0275d8";
                                                                                                                } else if ((($ckrak2022 / $sk->target_kinerja) * 100) >= 76 && (($ckrak2022 / $sk->target_kinerja) * 100) < 91) {
                                                                                                                    $color = "#5cb85c";
                                                                                                                } else if ((($ckrak2022 / $sk->target_kinerja) * 100) >= 66 && (($ckrak2022 / $sk->target_kinerja) * 100) < 76) {
                                                                                                                    $color = "#F7FF93";
                                                                                                                } else if ((($ckrak2022 / $sk->target_kinerja) * 100) >= 51 && (($ckrak2022 / $sk->target_kinerja) * 100) < 66) {
                                                                                                                    $color = "#f0ad4e";
                                                                                                                } else {
                                                                                                                    $color = "#d9534f";
                                                                                                                }
                                                                                                            }else{
                                                                                                                $color = "#d9534f";
                                                                                                            }
                                                                                                        }else{
                                                                                                            $color = "#d9534f";
                                                                                                        }
                                                                                                        ?>
                                                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                if($ckrak2022 != NULL && $sk->target_kinerja != NULL){
                                                                                                                    if ($ckrak2022 != 0 && $sk->target_kinerja != 0) {
                                                                                                                        echo number_format((($ckrak2022 / $sk->target_kinerja) * 100), 2) . "%";
                                                                                                                    }else{
                                                                                                                        echo number_format(0, 2) . "%";
                                                                                                                    }
                                                                                                                }else{
                                                                                                                    echo number_format(0, 2) . "%";
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                        <?php
                                                                                                        if($ckraa2022 != NULL && $sk->target_anggaran!= NULL){
                                                                                                            if($ckraa2022 != 0 && $sk->target_anggaran!= 0){
                                                                                                                if ((($ckraa2022 / $sk->target_anggaran) * 100) >= 91 && (($ckraa2022 / $sk->target_anggaran) * 100) <= 100) {
                                                                                                                    $color = "#0275d8";
                                                                                                                } else if ((($ckraa2022 / $sk->target_anggaran) * 100) >= 76 && (($ckraa2022 / $sk->target_anggaran) * 100) < 91) {
                                                                                                                    $color = "#5cb85c";
                                                                                                                } else if ((($ckraa2022 / $sk->target_anggaran) * 100) >= 66 && (($ckraa2022 / $sk->target_anggaran) * 100) < 76) {
                                                                                                                    $color = "#F7FF93";
                                                                                                                } else if ((($ckraa2022 / $sk->target_anggaran) * 100) >= 51 && (($ckraa2022 / $sk->target_anggaran) * 100) < 66) {
                                                                                                                    $color = "#f0ad4e";
                                                                                                                } else {
                                                                                                                    $color = "#d9534f";
                                                                                                                }
                                                                                                            }else{
                                                                                                                $color = "#d9534f";
                                                                                                            }
                                                                                                        }else{
                                                                                                            $color = "#d9534f";
                                                                                                        }
                                                                                                        ?>
                                                                                                        <td style="font-style: italic; font-size: 11px; background-color: <?php echo $color; ?> ;">
                                                                                                            <?php
                                                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                                                if($ckraa2022 != NULL && $sk->target_anggaran != NULL){
                                                                                                                    if ($ckraa2022 != 0 && $sk->target_anggaran != 0) {
                                                                                                                        echo number_format((($ckraa2022 / $sk->target_anggaran) * 100), 2) . "%";
                                                                                                                    }else{
                                                                                                                        echo number_format(0, 2) . "%";
                                                                                                                    }
                                                                                                                }else{
                                                                                                                   echo number_format(0, 2) . "%";
                                                                                                                }
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
    <!-- /.content -->
</div>