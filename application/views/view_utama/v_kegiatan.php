<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url(); ?>assets/utama/images/perpus.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $page_name; ?><i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread"><?php echo $page_name; ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- <style>
    table,
    thead,
    tbody,
    th,
    tr,
    td {
        border: 0.5px solid black;
    }
</style> -->

<section class="ftco-section bg-light ftco-faqs">
    <div style="padding-left: 120px; padding-right: 120px;">
        <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <?php
            $no = 0;
            foreach ($kegiatan as $k) :
            ?>
                <div class="card">
                    <div class="card-header p-0" id="<?php echo 'heading' . $no; ?>" role="tab">
                        <h2 class="mb-0">
                            <button href="<?php echo '#collapse' . $no; ?>" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="<?php echo 'collapse' . $no; ?>">
                                <p class="mb-0"><?php echo $k->id_jenis_urusan . ". " . $k->id_bidang_urusan . " ." . $k->id_program . ". " . $k->id_kegiatan . " " . $k->nama_kegiatan ?></p>
                                <i class="fa" aria-hidden="true"></i>
                            </button>
                        </h2>
                    </div>
                    <div class="collapse" id="<?php echo 'collapse' . $no; ?>" role="tabpanel" aria-labelledby="<?php echo 'heading' . $no; ?>">
                        <div class="card-body py-3 pl-3 pr-3">
                            <!-- <ol> -->
                            <table style="font-size: 8px; padding-left: 5px;" class="table table-bordered">
                                <thead style="background-color: lightseagreen; color: white; text-align: center;">
                                    <tr>
                                        <th rowspan="3">No</th>
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
                                </thead>
                                <tbody style="color: black;">
                                    <?php
                                    $nomor = 1;
                                    foreach ($sub_kegiatan as $sk) :
                                        if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                    ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $nomor; ?></td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->nama_sub_kegiatan;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->indikator_sub_kegiatan;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->satuan;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->target_kinerja;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->target_anggaran, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->ck2021;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->ca2021, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->tk2022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->tka2022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->ckt12022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->cat12022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->ckt22022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->cat22022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->ckt32022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->cat32022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo $sk->ckt42022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        echo "Rp " . number_format($sk->cat42022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        // echo $sk->ck_2022;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        // echo "Rp " . number_format($sk->ca_2022, 2, ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    if ($sk->id_jenis_urusan == $k->id_jenis_urusan && $sk->id_bidang_urusan == $k->id_bidang_urusan && $sk->id_program == $k->id_program && $sk->id_kegiatan == $k->id_kegiatan) {
                                                        // echo (($sk->ck_2022 / $sk->target_kinerja) * 100) . "%";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="font-style: italic; font-size: 8px;">
                                                    <?php
                                                    echo $program[0]->opd_penanggung_jawab;
                                                    ?>
                                                </td>

                                            </tr>
                                    <?php
                                            $nomor++;
                                        }

                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <!-- </ol> -->
                            <!-- <ol>
                                <li>Far far away, behind the word mountains</li>
                                <li>Consonantia, there live the blind texts</li>
                                <li>When she reached the first hills of the Italic Mountains</li>
                                <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                <li>Separated they live in Bookmarksgrove right</li>
                            </ol> -->
                        </div>
                    </div>
                </div>
            <?php
                $no++;
            endforeach;
            ?>
        </div>
    </div>
</section>