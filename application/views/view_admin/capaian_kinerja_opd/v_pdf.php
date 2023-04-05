<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
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
                <th rowspan="2" colspan="2" style="vertical-align: middle;">Capaian Kinerja s/d Tahun 2022</th>
                <th rowspan="3" style="vertical-align: middle;">Tingkat Capaian Kinerja s/d Tahun 2022 (%)</th>
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
        <tbody style="font-size: 12px;" >
            <?php
            // $no = 1;
            foreach ($jenis_urusan as $ju) :
            ?>
                <tr style="background-color: rgb(252, 252, 144, 0.8);">
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
                </tr>
                <?php
                foreach ($bidang_urusan as $bu) :
                    if ($bu->id_jenis_urusan == $ju->id_jenis_urusan) {
                ?>
                        <tr style="background-color: rgb(137, 250, 164, 0.8);">
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
                        </tr>
                        <?php
                        foreach ($program as $p) :
                            if ($p->id_jenis_urusan == $ju->id_jenis_urusan && $p->id_bidang_urusan == $bu->id_bidang_urusan) {
                        ?>
                                <tr style="background-color: rgb(250, 137, 137, 0.8);"> 
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
                                        <tr style="background-color: rgb(250, 167, 137, 0.8);">
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
                                                <tr style="background-color: rgb(242, 242, 242, 0.8);">
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
                                                    <td style="font-style: italic; font-size: 11px; ">
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
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->target_kinerja;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->target_anggaran, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->ck_2021;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->ca_2021, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->tk;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->ta, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->ck_t1_2022;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->ca_t1_2022, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->ck_t2_2022;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->ca_t2_2022, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo $sk->ck_2022;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="font-style: italic; font-size: 11px; text-align: justify;">
                                                        <?php
                                                        if ($sk->id_jenis_urusan == $ju->id_jenis_urusan && $sk->id_bidang_urusan == $bu->id_bidang_urusan && $sk->id_program == $p->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                            echo "Rp " . number_format($sk->ca_2022, 2, ',', '.');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td></td>
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
    <!-- /.content -->
</body>

</html>