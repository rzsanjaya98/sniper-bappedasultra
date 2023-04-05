<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $page_name ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_name ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/capaian_kinerja_opd/export_pdf'); ?>" class="btn-sm btn-danger" target="_blank">Export to PDF</a>
                    <!-- <h3 class="card-title" align="center" style="margin-left:auto;margin-right:auto"> -->
                    <!-- <div class="row">
                                <img src="<?php echo base_url(); ?>assets/utama/images/sultra.png" alt="" width="70" height="70">
                                <p>Badan Perencanaan Pembangunan Daerah</p>
                                <p> Provinsi Sulawesi Tenggara</p>
                            </div> -->
                    <!-- </h3> -->
                </div>
                <div class="card-body">
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
                        <thead style="font-size: 12px; text-align: center; background-color: lightskyblue;">
                            <tr>
                                <th rowspan="2" colspan="5">Kode</th>
                                <th rowspan="3" style="vertical-align: middle;">Jenis Urusan / Bidang Urusan / Program / Kegiatan / Sub Kegiatan</th>
                                <th rowspan="3" style="vertical-align: middle;">Indikator Kinerja Program (Outcome)/ Kegiatan (Output)/ Sub Kegiatan (Sub Output)</th>
                                <th rowspan="3" style="vertical-align: middle;">Satuan</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja RPJMD & Renstra PD Tahun 2023 </th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja s/d Tahun 2021</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Target Kinerja Tahun 2022</th>
                                <th colspan="8" style="vertical-align: middle;">Capaian Kinerja Tahun 2022</th>
                                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja s/d Tahun 2021</th>
                                <th rowspan="3" style="vertical-align: middle;">Tingkat Capaian Kinerja s/d Tahun 2021 (%)</th>
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
                                        </tr>
                                        <?php
                                        foreach ($program as $p) :
                                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                        ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                                    <td style="text-align: center;">
                                                        <?php
                                                        if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                            echo $p->id_bidang_urusan;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
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
                                                    <td></td>
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
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $ju->id_jenis_urusan ?></td>
                                                            <td style="text-align: center;">
                                                                <?php
                                                                if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan) {
                                                                    echo $k->id_bidang_urusan;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($k->id_jenis_urusan == $ju->id_jenis_urusan && $k->id_bidang_urusan == $bu->id_bidang_urusan && $k->id_program == $p->id_program) {
                                                                    echo $k->id_program;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
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
                                                            <td></td>
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
                                                                    <td>
                                                                        <?php
                                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program) {
                                                                            echo $sk->id_program;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program) {
                                                                            echo $sk->id_kegiatan;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
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
                                                                    <!-- <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                                echo "Rp " . number_format($sk->target_anggaran, 2, ',', '.');
                                                                            }
                                                                            ?>
                                                                        </td> -->
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
                                                                    <!-- <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            $ca2020 = 0;
                                                                            foreach ($capaian_2020 as $c_2020) {
                                                                                if ($c_2020->id_jenis_urusan == $ju->id_jenis_urusan && $c_2020->id_bidang_urusan == $bu->id_bidang_urusan && $c_2020->id_program == $p->id_program && $c_2020->id_kegiatan == $k->id_kegiatan && $c_2020->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo "Rp " . number_format($c_2020->capaian_anggaran, 2, ',', '.');
                                                                                    $ca2020 = $c_2020->capaian_anggaran;
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td> -->
                                                                    <td style="font-style: italic; font-size: 11px;">
                                                                        <?php
                                                                        foreach ($target_2021 as $t_2021) {
                                                                            if ($t_2021->id_jenis_urusan == $ju->id_jenis_urusan && $t_2021->id_bidang_urusan == $bu->id_bidang_urusan && $t_2021->id_program == $p->id_program && $t_2021->id_kegiatan == $k->id_kegiatan && $t_2021->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                echo $t_2021->target_kinerja;
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <!-- <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            foreach ($target_2021 as $t_2021) {
                                                                                if ($t_2021->id_jenis_urusan == $ju->id_jenis_urusan && $t_2021->id_bidang_urusan == $bu->id_bidang_urusan && $t_2021->id_program == $p->id_program && $t_2021->id_kegiatan == $k->id_kegiatan && $t_2021->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo "Rp " . number_format($t_2021->target_anggaran, 2, ',', '.');
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td> -->
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
                                                                    <!-- <td style="font-style: italic; font-size: 11px;">
                                                                            <?php
                                                                            $ca2021 = 0;
                                                                            foreach ($capaian_2021 as $c_2021) {
                                                                                if ($c_2021->id_jenis_urusan == $ju->id_jenis_urusan && $c_2021->id_bidang_urusan == $bu->id_bidang_urusan && $c_2021->id_program == $p->id_program && $c_2021->id_kegiatan == $k->id_kegiatan && $c_2021->id_sub_kegiatan == $sk->id_sub_kegiatan) {
                                                                                    echo "Rp " . number_format($c_2021->capaian_anggaran, 2, ',', '.');
                                                                                    $ca2021 = $c_2021->capaian_anggaran;
                                                                                }
                                                                            }
                                                                            ?>
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
                                                                    <!-- <td style="font-style: italic; font-size: 11px;"><?php echo "Rp " . number_format(($ca2020 + $ca2021), 2, ',', '.'); ?></td> -->
                                                                    <!-- <td style="font-style: italic; font-size: 11px;">
                                                                        <?php
                                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                                            echo $sk->opd_penanggung_jawab;
                                                                        }
                                                                        ?>
                                                                    </td> -->
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
    <!-- /.content -->
</div>