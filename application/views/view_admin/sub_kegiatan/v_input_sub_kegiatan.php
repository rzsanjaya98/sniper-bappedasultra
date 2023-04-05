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
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form <?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open("admin/program_sultra/input_sub_kegiatan/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan"); ?>

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label>Kode Sub Kegiatan</label>
                                    <input type="text" class="form-control" name="kode_sub_kegiatan" placeholder="Kode Sub Kegiatan" value="<?php echo set_value('kode_sub_kegiatan'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_sub_kegiatan'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kegiatan</label>
                                    <input type="text" class="form-control" name="nama_sub_kegiatan" placeholder="Nama Sub Kegiatan" value="<?php echo set_value('nama_sub_kegiatan'); ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_sub_kegiatan'); ?></span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Indikator Sub Kegiatan</label>
                                            <input type="text" class="form-control" name="indikator_sub_kegiatan" placeholder="Indikator Sub Kegiatan" value="<?php echo set_value('indikator_sub_kegiatan'); ?>">
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_sub_kegiatan'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select name="satuan" class="form-control">
                                                <option value=""></option>
                                                <option value="Aduan">Aduan</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Angkutan Laut Pelayaran Rakyat">Angkutan Laut Pelayaran Rakyat</option>
                                                <option value="Arsip">Arsip</option>
                                                <option value="Badan Usaha">Badan Usaha</option>
                                                <option value="Berita Acara">Berita Acara</option>
                                                <option value="Berkas">Berkas</option>
                                                <option value="BPSK">BPSK</option>
                                                <option value="Buah">Buah</option>
                                                <option value="Bulan">Bulan</option>
                                                <option value="Daftar">Daftar</option>
                                                <option value="Desa">Desa</option>
                                                <option value="Dokumen">Dokumen</option>
                                                <option value="Dokumen Ketetapan">Dokumen Ketetapan</option>
                                                <option value="Dokumen Dokumen LHP">Dokumen LHP</option>
                                                <option value="Dokumen SSPD">Dokumen SSPD</option>
                                                <option value="Dokumen Surat Persetujuan/Penolakan">Dokumen Surat Persetujuan/Penolakan</option>                                                                                                
                                                <option value="Ekor">Ekor</option>
                                                <option value="Eksampelar">Eksampelar</option>
                                                <option value="Entitas">Entitas</option>
                                                <option value="Entry">Entry</option>
                                                <option value="Fasilitas">Fasilitas</option>
                                                <option value="Ha">Ha</option>
                                                <option value="Ijin">Ijin</option>
                                                <option value="Jiwa">Jiwa</option>
                                                <option value="Kab/Kota">Kab/Kota</option>
                                                <option value="Kali">Kali</option>
                                                <option value="Kasus">Kasus</option>
                                                <option value="Kawasan">Kawasan</option>
                                                <option value="Kegiatan">Kegiatan</option>
                                                <option value="Kegiatan Usaha">Kegiatan Usaha</option>
                                                <option value="Kelompok">Kelompok</option>
                                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                <option value="Kesepakatan">Kesepakatan</option>
                                                <option value="Klien">Klien</option>
                                                <option value="KM">KM</option>
                                                <option value="Komoditi">Komoditi</option>
                                                <option value="Koperasi">Koperasi</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Laporan">Laporan</option>
                                                <option value="Layanan">Layanan</option>
                                                <option value="Lembaga">Lembaga</option>
                                                <option value="Liter/Detik">Liter/Detik</option>
                                                <option value="Lokasi">Lokasi</option>
                                                <option value="Lokus">Lokus</option>
                                                <option value="LPK">LPK</option>
                                                <option value="LPKSM">LPKSM</option>
                                                <option value="Meter">Makam</option>
                                                <option value="Masukan">Masukan</option>
                                                <option value="Meter">Meter</option>
                                                <option value="Meter Persegi">Meter Persegi</option>
                                                <option value="Naskah">Naskah</option>
                                                <option value="Objek">Objek</option>
                                                <option value="Operasi">Operasi</option>
                                                <option value="Orang/Bulan">Orang/Bulan</option>
                                                <option value="Orang">Orang</option>
                                                <option value="Organisasi">Organisasi</option>
                                                <option value="Paket">Paket</option>
                                                <option value="Pelabuhan">Pelabuhan</option>
                                                <option value="Pelaku Usaha">Pelaku Usaha</option>
                                                <option value="Pelatda">Pelatda</option>
                                                <option value="Pengaduan">Pengaduan</option>
                                                <option value="Pengguna">Pengguna</option>
                                                <option value="Perangkat Daerah">Perangkat Daerah</option>
                                                <option value="Perkara">Perkara</option>
                                                <option value="Permohonan">Permohonan</option>
                                                <option value="Perpustakaan">Perpustakaan</option>
                                                <option value="Persen">Persen</option>
                                                <option value="Perusahaan">Perusahaan</option>
                                                <option value="Peserta">Peserta</option>
                                                <option value="Pos Layanan">Pos Layanan</option>
                                                <option value="Produk">Produk</option>
                                                <option value="PSM">PSM</option>
                                                <option value="PSKS">PSKS</option>
                                                <option value="PT">PT</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="Rekomendasi">Rekomendasi</option>
                                                <option value="Ruang">Ruang</option>
                                                <option value="Sarana dan Prasarana">Sarana dan Prasarana</option>
                                                <option value="Satuan Permukiman">Satuan Permukiman</option>
                                                <option value="Sekolah">Sekolah</option>
                                                <option value="Sertifikat">Sertifikat</option>
                                                <option value="Set">Set</option>
                                                <option value="Siswa">Siswa</option>
                                                <option value="Sistem Jaringan">Sistem Jaringan</option>
                                                <option value="SK Evaluasi">SK Evaluasi</option>
                                                <option value="SKPD">SKPD</option>
                                                <option value="Surat Keputusan">Surat Keputusan</option>
                                                <option value="Tahun">Tahun</option>
                                                <option value="Terminal">Terminal</option>
                                                <option value="TKSK">Titik</option>
                                                <option value="Ton">Ton</option>
                                                <option value="TKSK">TKSK</option>
                                                <option value="UMKM">UMKM</option>
                                                <option value="Unit">Unit</option>
                                                <option value="Unit Kerja">Unit Kerja</option>
                                                <option value="Unit Rumah">Unit Rumah</option>
                                                <option value="Unit Usaha">Unit Usaha</option>
                                            </select>
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('satuan'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Target Kinerja</label>
                                            <input type="text" class="form-control" name="target_kinerja" placeholder="Target Kinerja" value="<?php echo set_value('target_kinerja'); ?>">
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_kinerja'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Target Anggaran</label>
                                            <input type="text" class="form-control" name="target_anggaran" placeholder="Target Anggaran" value="<?php echo set_value('target_anggaran'); ?>">
                                            <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_anggaran'); ?></span>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>OPD Penanggung Jawab</label>
                                    <select name="opd" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($instansi_opd as $opd) : ?>
                                            <option value="<?php echo $opd->nama_instansi_opd ?>"><?php echo $opd->nama_instansi_opd ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('opd'); ?></span>
                                </div> -->
                                <input type="hidden" class="form-control" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_program" value="<?php echo $id_program; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>" hidden only>
                                <input type="hidden" class="form-control" name="id_opd" value="<?php echo $id_opd; ?>" hidden only>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
    </section>

</div>