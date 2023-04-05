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
                        <?php echo form_open("admin/program_sultra/update_sub_kegiatan/$id_opd/$id_jenis_urusan/$id_bidang_urusan/$id_program/$id_kegiatan/$id_sub_kegiatan"); ?>
                        <?php foreach ($sub_kegiatan as $file) { ?>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Sub Kegiatan</label>
                                        <input type="text" class="form-control" name="kode_sub_kegiatan" placeholder="Kode Sub Kegiatan" value="<?php echo $file->id_sub_kegiatan ?>" readonly>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('kode_sub_kegiatan'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Sub Kegiatan</label>
                                        <input type="text" class="form-control" name="nama_sub_kegiatan" placeholder="Nama Sub Kegiatan" value="<?php echo $file->nama_sub_kegiatan ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('nama_sub_kegiatan'); ?></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Indikator Sub Kegiatan</label>
                                                <input type="text" class="form-control" name="indikator_sub_kegiatan" placeholder="Indikator Sub Kegiatan" value="<?php echo $file->indikator_sub_kegiatan ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('indikator_sub_kegiatan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <select name="satuan" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Arsip" <?php if ($file->satuan == "Arsip") echo "selected"; ?>>Arsip</option>
                                                    <option value="Berita Acara" <?php if ($file->satuan == "Berita Acara") echo "selected"; ?>>Berita Acara</option>
                                                    <option value="Berkas" <?php if ($file->satuan == "Berkas") echo "selected"; ?>>Berkas</option>
                                                    <option value="BPSK" <?php if ($file->satuan == "BPSK") echo "selected"; ?>>BPSK</option>
                                                    <option value="Buku" <?php if ($file->satuan == "Buku") echo "selected"; ?>>Buku</option>
                                                    <option value="Bulan" <?php if ($file->satuan == "Bulan") echo "selected"; ?>>Bulan</option>
                                                    <option value="Daftar" <?php if ($file->satuan == "Daftar") echo "selected"; ?>>Daftar</option>
                                                    <option value="Desa" <?php if ($file->satuan == "Desa") echo "selected"; ?>>Desa</option>
                                                    <option value="Dokumen" <?php if ($file->satuan == "Dokumen") echo "selected"; ?>>Dokumen</option>
                                                    <option value="Dokumen Ketetapan" <?php if ($file->satuan == "Dokumen Ketetapan") echo "selected"; ?>>Dokumen Ketetapan</option>
                                                    <option value="Dokumen LHP" <?php if ($file->satuan == "Dokumen LHP") echo "selected"; ?>>Dokumen LHP</option>
                                                    <option value="Dokumen SSPD" <?php if ($file->satuan == "Dokumen SSPD") echo "selected"; ?>>Dokumen SSPD</option>
                                                    <option value="Dokumen Surat Perset" <?php if ($file->satuan == "Dokumen Surat Perset") echo "selected"; ?>>Dokumen Surat Perset</option>
                                                    <option value="Dokumen Surat Persetujuan/Penolakan" <?php if ($file->satuan == "Dokumen Surat Persetujuan/Penolakan") echo "selected"; ?>>Dokumen Surat Persetujuan/Penolakan</option>                                                    
                                                    <option value="Ekor" <?php if ($file->satuan == "Ekor") echo "selected"; ?>>Ekor</option>
                                                    <option value="Eksampelar" <?php if ($file->satuan == "Eksampelar") echo "selected"; ?>>Eksampelar</option>
                                                    <option value="Entitas" <?php if ($file->satuan == "Entitas") echo "selected"; ?>>Entitas</option>
                                                    <option value="Entry" <?php if ($file->satuan == "Entry") echo "selected"; ?>>Entry</option>
                                                    <option value="Ha" <?php if ($file->satuan == "Ha") echo "selected"; ?>>Ha</option>
                                                    <option value="Kab/Kota" <?php if ($file->satuan == "Kab/Kota") echo "selected"; ?>>Kab/Kota</option>
                                                    <option value="Kasus" <?php if ($file->satuan == "Kasus") echo "selected"; ?>>Kasus</option>
                                                    <option value="Kawasan" <?php if ($file->satuan == "Kawasan") echo "selected"; ?>>Kawasan</option>
                                                    <option value="Kegiatan" <?php if ($file->satuan == "Kegiatan") echo "selected"; ?>>Kegiatan</option>
                                                    <option value="Kegiatan Usaha" <?php if ($file->satuan == "Kegiatan Usaha") echo "selected"; ?>>Kegiatan Usaha</option>
                                                    <option value="Kelompok" <?php if ($file->satuan == "Kelompok") echo "selected"; ?>>Kelompok</option>
                                                    <option value="Keluarga" <?php if ($file->satuan == "Keluarga") echo "selected"; ?>>Keluarga</option>
                                                    <option value="Kepala Keluarga" <?php if ($file->satuan == "Kepala Keluarga") echo "selected"; ?>>Kepala Keluarga</option>
                                                    <option value="Kesepakatan" <?php if ($file->satuan == "Kesepakatan") echo "selected"; ?>>Kesepakatan</option>
                                                    <option value="KM" <?php if ($file->satuan == "KM") echo "selected"; ?>>KM</option>
                                                    <option value="Komoditi" <?php if ($file->satuan == "Komoditi") echo "selected"; ?>>Komoditi</option>
                                                    <option value="Laporan" <?php if ($file->satuan == "Laporan") echo "selected"; ?>>Laporan</option>
                                                    <option value="Layanan" <?php if ($file->satuan == "Layanan") echo "selected"; ?>>Layanan</option>
                                                    <option value="Lembaga" <?php if ($file->satuan == "Lembaga") echo "selected"; ?>>Lembaga</option>
                                                    <option value="Liter/Detik" <?php if ($file->satuan == "Liter/Detik") echo "selected"; ?>>Liter/Detik</option>
                                                    <option value="Lokasi" <?php if ($file->satuan == "Lokasi") echo "selected"; ?>>Lokasi</option>
                                                    <option value="Lokus" <?php if ($file->satuan == "Lokus") echo "selected"; ?>>Lokus</option>
                                                    <option value="LPK" <?php if ($file->satuan == "LPK") echo "selected"; ?>>LPK</option>
                                                    <option value="LPKSM" <?php if ($file->satuan == "LPKSM") echo "selected"; ?>>LPKSM</option>
                                                    <option value="Makam" <?php if ($file->satuan == "Makam") echo "selected"; ?>>Makam</option>
                                                    <option value="Masukan" <?php if ($file->satuan == "Masukan") echo "selected"; ?>>Masukan</option>
                                                    <option value="Meter" <?php if ($file->satuan == "Meter") echo "selected"; ?>>Meter</option>
                                                    <option value="Meter Persegi" <?php if ($file->satuan == "Meter Persegi") echo "selected"; ?>>Meter Persegi</option>
                                                    <option value="Naskah" <?php if ($file->satuan == "Naskah") echo "selected"; ?>>Naskah</option>
                                                    <option value="Objek" <?php if ($file->satuan == "Objek") echo "selected"; ?>>Objek</option>
                                                    <option value="Operasi" <?php if ($file->satuan == "Operasi") echo "selected"; ?>>Operasi</option>
                                                    <option value="Orang/Bulan" <?php if ($file->satuan == "Orang/Bulan") echo "selected"; ?>>Orang/Bulan</option>
                                                    <option value="Orang" <?php if ($file->satuan == "Orang") echo "selected"; ?>>Orang</option>
                                                    <option value="Organisasi" <?php if ($file->satuan == "Organisasi") echo "selected"; ?>>Organisasi</option>
                                                    <option value="Paket" <?php if ($file->satuan == "Paket") echo "selected"; ?>>Paket</option>
                                                    <option value="Pelaku Usaha" <?php if ($file->satuan == "Pelaku Usaha") echo "selected"; ?>>Pelaku Usaha</option>
                                                    <option value="Pelatda" <?php if ($file->satuan == "Pelatda") echo "selected"; ?>>Pelatda</option>
                                                    <option value="Pengaduan" <?php if ($file->satuan == "Pengaduan") echo "selected"; ?>>Pengaduan</option>
                                                    <option value="Pengguna" <?php if ($file->satuan == "Pengguna") echo "selected"; ?>>Pengguna</option>
                                                    <option value="Perangkat Daerah" <?php if ($file->satuan == "Perangkat Daerah") echo "selected"; ?>>Perangkat Daerah</option>
                                                    <option value="Permohonan" <?php if ($file->satuan == "Permohonan") echo "selected"; ?>>Permohonan</option>
                                                    <option value="Perkara" <?php if ($file->satuan == "Perkara") echo "selected"; ?>>Perkara</option>
                                                    <option value="Perpustakaan" <?php if ($file->satuan == "Perpustakaan") echo "selected"; ?>>Perpustakaan</option>
                                                    <option value="Persen" <?php if ($file->satuan == "Persen") echo "selected"; ?>>Persen</option>
                                                    <option value="Perusahaan" <?php if ($file->satuan == "Perusahaan") echo "selected"; ?>>Perusahaan</option>
                                                    <option value="Peserta Didik" <?php if ($file->satuan == "Peserta Didik") echo "selected"; ?>>Peserta Didik</option>
                                                    <option value="Produk" <?php if ($file->satuan == "Produk") echo "selected"; ?>>Produk</option>
                                                    <option value="PT" <?php if ($file->satuan == "PT") echo "selected"; ?>>PT</option>
                                                    <option value="Puskesmas" <?php if ($file->satuan == "Puskesmas") echo "selected"; ?>>Puskesmas</option>
                                                    <option value="Rekomendasi" <?php if ($file->satuan == "Rekomendasi") echo "selected"; ?>>Rekomendasi</option>
                                                    <option value="Ruang" <?php if ($file->satuan == "Ruang") echo "selected"; ?>>Ruang</option>
                                                    <option value="Sarana" <?php if ($file->satuan == "Sarana") echo "selected"; ?>>Sarana</option>
                                                    <option value="Sarana dan Prasarana" <?php if ($file->satuan == "Sarana dan Prasarana") echo "selected"; ?>>Sarana dan Prasarana</option>
                                                    <option value="Satuan Pendidikan" <?php if ($file->satuan == "Satuan Pendidikan") echo "selected"; ?>>Satuan Pendidikan</option>
                                                    <option value="Satuan Permukiman" <?php if ($file->satuan == "Satuan Permukiman") echo "selected"; ?>>Satuan Permukiman</option>
                                                    <option value="Sekolah" <?php if ($file->satuan == "Sekolah") echo "selected"; ?>>Sekolah</option>
                                                    <option value="Set" <?php if ($file->satuan == "Set") echo "selected"; ?>>Set</option>
                                                    <option value="Sertifikat" <?php if ($file->satuan == "Sertifikat") echo "selected"; ?>>Sertifikat</option>
                                                    <option value="Sistem Jaringan" <?php if ($file->satuan == "Sistem Jaringan") echo "selected"; ?>>Sistem Jaringan</option>
                                                    <option value="Siswa" <?php if ($file->satuan == "Siswa") echo "selected"; ?>>Siswa</option>
                                                    <option value="Surat Keputusan" <?php if ($file->satuan == "Surat Keputusan") echo "selected"; ?>>Surat Keputusan</option>
                                                    <option value="Ton" <?php if ($file->satuan == "Ton") echo "selected"; ?>>Ton</option>
                                                    <option value="Unit" <?php if ($file->satuan == "UMKM") echo "selected"; ?>>UMKM</option>
                                                    <option value="Unit" <?php if ($file->satuan == "Unit") echo "selected"; ?>>Unit</option>
                                                    <option value="Unit Rumah" <?php if ($file->satuan == "Unit Kerja") echo "selected"; ?>>Unit Kerja</option>
                                                    <option value="Unit Rumah" <?php if ($file->satuan == "Unit Rumah") echo "selected"; ?>>Unit Rumah</option>
                                                    <option value="Unit Usaha" <?php if ($file->satuan == "Unit Usaha") echo "selected"; ?>>Unit Usaha</option>
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('satuan'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Target Kinerja</label>
                                                <input type="text" class="form-control" name="target_kinerja" placeholder="Target Kinerja" value="<?php echo $file->target_kinerja; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_kinerja'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Target Anggaran</label>
                                                <input type="text" class="form-control" name="target_anggaran" placeholder="Target Anggaran" value="<?php echo $file->target_anggaran; ?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('target_anggaran'); ?></span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label>OPD Penanggung Jawab</label>
                                        <select name="opd" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($instansi_opd as $opd) : ?>
                                                <option value="<?php echo $opd->nama_instansi_opd ?>" <?php if ($file->opd_penanggung_jawab == $opd->nama_instansi_opd) echo "selected"; ?>><?php echo $opd->nama_instansi_opd ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="glyphicon glyphicon-user form-control-feedback" style="color:red"><?php echo form_error('opd'); ?></span>
                                    </div> -->
                                    <input type="hidden" name="id_jenis_urusan" value="<?php echo $id_jenis_urusan; ?>">
                                    <input type="hidden" name="id_bidang_urusan" value="<?php echo $id_bidang_urusan; ?>">
                                    <input type="hidden" name="id_program" value="<?php echo $id_program; ?>">
                                    <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>">
                                    <input type="hidden" name="id_opd" value="<?php echo $id_opd; ?>">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <!-- /.card -->
    </section>

</div>