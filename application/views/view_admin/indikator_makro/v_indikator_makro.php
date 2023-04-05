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
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Regional Sulawesi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kab/Kota (Sultra)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <a href="<?php echo site_url('admin/indikator_makro/input_data_makro_regional'); ?>" class="btn-sm btn-primary" style="float: left;">Input Data</a>
                                    <br><br>
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo $nasional[0]->provinsi_nasional; ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $nasional[0]->provinsi_nasional; ?>" aria-expanded="true" aria-controls="collapse<?php echo $nasional[0]->provinsi_nasional; ?>">
                                                        <?php echo $nasional[0]->provinsi_nasional; ?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $nasional[0]->provinsi_nasional; ?>" class="collapse" aria-labelledby="heading<?php echo $nasional[0]->provinsi_nasional; ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5" style="width: 10px; text-align: center;">Indikator</th>
                                                                <th rowspan="2" style="text-align: center;">Tahun</th>
                                                                <th rowspan="2" colspan="3" style="text-align: center;">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Pertumbuhan Ekonomi (%)</th>
                                                                <th>Gini Rasio</th>
                                                                <th>Persentase Penduduk Miskin (%)</th>
                                                                <th>IPM</th>
                                                                <th>Tingkat Pengangguran Terbuka (%)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            <?php foreach ($data_indikator_indonesia as $data) :
                                                            ?> <tr>
                                                                    <td><?php echo $data->data_pertumbuhan_ekonomi; ?></td>
                                                                    <td><?php echo $data->data_gini_rasio; ?></td>
                                                                    <td><?php echo $data->data_persentase_penduduk_miskin; ?></td>
                                                                    <td><?php echo $data->data_indeks_pembangunan_manusia; ?></td>
                                                                    <td><?php echo $data->data_tingkat_pengangguran_terbuka; ?></td>
                                                                    <td><?php echo $data->tahun; ?></td>
                                                                    <td style="width: 30px;">
                                                                        <a href="<?php echo site_url('admin/indikator_makro/update_data_makro_regional/') . $data->provinsi_nasional . '/' . $data->tahun; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                                    </td>
                                                                    <td style="width: 30px;">
                                                                        <a href="<?php echo site_url('admin/indikator_makro/delete_data_makro_regional/') . $data->provinsi_nasional . '/' . $data->tahun; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Data tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no = 1;
                                        foreach ($provinsi as $prov) : ?>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo<?php echo $no; ?>">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo<?php echo $no; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $no; ?>">
                                                            <?php echo $prov->provinsi_nasional; ?>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo<?php echo $no; ?>" class="collapse" aria-labelledby="headingTwo<?php echo $no; ?>" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="width: 10px; text-align: center;">Indikator</th>
                                                                    <th rowspan="2" style="text-align: center;">Tahun</th>
                                                                    <th rowspan="2" colspan="3" style="text-align: center;">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pertumbuhan Ekonomi (%)</th>
                                                                    <th>Gini Rasio</th>
                                                                    <th>Persentase Penduduk Miskin (%)</th>
                                                                    <th>IPM</th>
                                                                    <th>Tingkat Pengangguran Terbuka (%)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="myTable">
                                                                <?php foreach ($data_indikator as $data) :
                                                                    if ($prov->provinsi_nasional == $data->provinsi_nasional) {
                                                                ?> <tr>
                                                                            <td><?php echo $data->data_pertumbuhan_ekonomi; ?></td>
                                                                            <td><?php echo $data->data_gini_rasio; ?></td>
                                                                            <td><?php echo $data->data_persentase_penduduk_miskin; ?></td>
                                                                            <td><?php echo $data->data_indeks_pembangunan_manusia; ?></td>
                                                                            <td><?php echo $data->data_tingkat_pengangguran_terbuka; ?></td>
                                                                            <td><?php echo $data->tahun; ?></td>
                                                                            <td style="width: 30px;">
                                                                                <a href="<?php echo site_url('admin/indikator_makro/update_data_makro_regional/') . $data->provinsi_nasional . '/' . $data->tahun; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                                            </td>
                                                                            <td style="width: 30px;">
                                                                                <a href="<?php echo site_url('admin/indikator_makro/delete_data_makro_regional/') . $data->provinsi_nasional . '/' . $data->tahun; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Data tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                                            </td>
                                                                        </tr>

                                                                <?php }
                                                                endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Collapsible Group Item #3
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php $no++;
                                        endforeach; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <a href="<?php echo site_url('admin/indikator_makro/input_data_makro_kab_kota'); ?>" class="btn-sm btn-primary" style="float: left;">Input Data</a>
                                    <br><br>
                                    <div id="accordion2">
                                        <?php $no = 1;
                                        foreach ($kabkota as $kab_kota) : ?>
                                            <div class="card">
                                                <div class="card-header" id="headingTw<?php echo $no; ?>">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTw<?php echo $no; ?>" aria-expanded="false" aria-controls="collapseTw<?php echo $no; ?>">
                                                            <?php echo $kab_kota->wilayah; ?>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTw<?php echo $no; ?>" class="collapse" aria-labelledby="headingTw<?php echo $no; ?>" data-parent="#accordion2">
                                                    <div class="card-body">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="width: 10px; text-align: center;">Indikator</th>
                                                                    <th rowspan="2" style="text-align: center;">Tahun</th>
                                                                    <th rowspan="2" colspan="3" style="text-align: center;">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pertumbuhan Ekonomi (%)</th>
                                                                    <th>Gini Rasio</th>
                                                                    <th>Persentase Penduduk Miskin (%)</th>
                                                                    <th>IPM</th>
                                                                    <th>Tingkat Pengangguran Terbuka (%)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="myTable">
                                                                <?php foreach ($data_indikator_kabkota as $data) :
                                                                    if ($kab_kota->wilayah == $data->wilayah) {
                                                                ?> <tr>
                                                                            <td><?php echo $data->data_pertumbuhan_ekonomi; ?></td>
                                                                            <td><?php echo $data->data_gini_rasio; ?></td>
                                                                            <td><?php echo $data->data_persentase_penduduk_miskin; ?></td>
                                                                            <td><?php echo $data->data_indeks_pembangunan_manusia; ?></td>
                                                                            <td><?php echo $data->data_tingkat_pengangguran_terbuka; ?></td>
                                                                            <td><?php echo $data->tahun; ?></td>
                                                                            <td style="width: 30px;">
                                                                                <a href="<?php echo site_url('admin/indikator_makro/update_data_makro_kab_kota/') . $data->wilayah . '/' . $data->tahun; ?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                                            </td>
                                                                            <td style="width: 30px;">
                                                                                <a href="<?php echo site_url('admin/indikator_makro/delete_data_makro_kab_kota/') . $data->wilayah . '/' . $data->tahun; ?>" onclick="return confirm('Apa Anda Yakin Menghapus Data tersebut ?')" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                                            </td>
                                                                        </tr>

                                                                <?php }
                                                                endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $no++;
                                        endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
    </section>



</div>