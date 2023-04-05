<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url(); ?>assets/utama/images/background.png');" data-stellar-background-ratio="0.5">
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

<section class="ftco-section bg-light">
    <div style="padding-left: 120px; padding-right: 120px;">

        <!-- Leaflet -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js"></script>
        <script src="https://unpkg.com/leaflet-ui@0.4.5/dist/leaflet-ui-src.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
        <style>
            #mapid {
                height: 1500px;
                /* width: 1500px; */
                padding-left: 15px;
                padding-right: 15px;
            }

            #legend1 {
                width: 220px;
                height: 18px;
                background: red;
                font-size: 8px;
                font-weight: bold;
                color: white;
                text-align: center;
                padding-top: 3px;
                /* border: 4px solid green; */
                margin: 10px;
                border-radius: 40px;
            }

            #legend2 {
                width: 180px;
                height: 18px;
                background: yellow;
                font-size: 8px;
                font-weight: bold;
                color: black;
                text-align: center;
                padding-top: 3px;
                /* border: 4px solid green; */
                margin: 10px;
                border-radius: 40px;
            }

            #legend3 {
                width: 200px;
                height: 18px;
                background: green;
                font-size: 8px;
                font-weight: bold;
                color: white;
                text-align: center;
                padding-top: 3px;
                /* border: 4px solid green; */
                margin: 10px;
                border-radius: 40px;
            }

            #box {
                width: 600px;
                height: 600px;
                background: white;
                border-radius: 20px;
            }

            #sumber {
                font-size: 8px;
                font-weight: bold;
                padding-left: 40px;
                color: black;
            }
        </style>
        <div id="mapid"></div>

        <script>
            // function Map1() {
            map1 = L.map('mapid', {
                center: [-4.27196559, 122.72161094, 78.47421233],
                zoom: 9,
                mapTypeId: 'satellite',
                mapTypeIds: ['streets', 'satellite', 'topo'],
                gestureHandling: false,
                searchControl: false,
                locateControl: false,
                pegmanControl: false,
                fullscreenControl: true,
                minimapControl: false,
                preferCanvas: false,
                dragging: false,
                attributeControl: false,
                minZoom: 9,
                // maxZoom: 18,
                maxZoom: 9,
                visualClick: false,
                //disableDefaultUI: false,
                layersControl: false,
                plugins: [
                    "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
                    "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
                ]
            });
            var kmz = L.kmzLayer().addTo(map1);

            kmz.on('load', function(e) {
                // control.addOverlay(e.layer, e.name);
                e.layer.addTo(map1);
            });
            kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
            kmz.load("<?php echo base_url(); ?>assets/maps/indikator_sultra.kmz");
            // map1.setView([-4.27196559, 122.72161094, 78.47421233], 9);
            // }
            // Map1();
        </script>


    </div>
</section>

<section class="ftco-section" style="background-image: linear-gradient(0deg, rgba(38, 38, 38, 0.9), rgba(102, 102, 102, 0.3)), url('<?php echo base_url(); ?>assets/utama/images/bg-blur.png'); background-size: 100%;">
    <div class="row col-lg-12 align-items-center justify-content-center mb-3 pb-5">
        <h3 style="font-weight: bold; color: white; font-size: 30px;">Data Pertumbuhan Ekonomi</h3>
    </div>
    <div class="row col-lg-12 align-items-center justify-content-center">
        <!-- <div id="mapid2" style="height: 500px; width: 500px;"></div> -->

        <div style="padding-right: 20px;">
            <div id="map_pertumbuhan_ekonomi" style="height: 600px; width: 600px;"></div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/maps/Peta Sultra.png" alt="Peta Sultra" width="900px" style="padding-right: 20px; padding-left: 20px;"> -->
        <div id="box">
            <div id="pertumbuhan_ekonomi" style="width: 700px; height: 500px;"></div>
            <div class="row align-items-center justify-content-center">
                <p id="legend1">Tidak lebih baik dari capaian Nasional & Provinsi</p>
                <p id="legend2">Di antara capaian Nasional & Provinsi</p>
                <p id="legend3">Lebih baik dari capaian Nasional & Provinsi</p>
            </div>
            <p id="sumber">Sumber: BPS Provinsi Sulawesi Tenggara</p>
        </div>
        <p style="width: 450px; text-align: center; font-size: 14px; color: white; padding-left: 20px; font-family: 'Lucida Sans';">Perekonomian Sulawesi Tenggara berdasarkan besaran Produk Domestik Regional Bruto (PDRB) tahun 2020 atas dasar harga berlaku mencapai Rp 130,18 triliun dan atas dasar harga konstan 2010 mencapai Rp 93,45 triliun.
Ekonomi Sulawesi Tenggara tahun 2020 mengalami kontraksi sebesar 0,65 persen dibanding capaian tahun 2019 yang tumbuh sebesar 6,50 persen (c-to-c). Dari sisi produksi, kontraksi terdalam terjadi pada Lapangan Usaha Transportasi dan Pergudangan sebesar 5,25 persen. Dari sisi pengeluaran, kontraksi terdalam terjadi pada Komponen Pengeluaran Konsumsi Lembaga Non Profit yang melayani Rumah Tangga (PK-LNPRT) sebesar 3,59 persen. Ekonomi Sulawesi Tenggara triwulan IV-2020 dibanding triwulan IV-2019 mengalami kontraksi sebesar 2,15 persen (y-on-y). Dari sisi produksi, Lapangan Usaha Perdagangan Besar dan Eceran, dan Reparasi Mobil dan Sepeda Motor mengalami kontraksi terdalam sebesar 9,14 persen. Sementara dari sisi pengeluaran, kontraksi terdalam terjadi pada Komponen Pengeluaran Konsumsi Pemerintah (PK-P) sebesar 2,87 persen. Ekonomi Sulawesi Tenggara triwulan IV-2020 tumbuh sebesar 2,11 persen (q-to-q) bila dibandingkan triwulan sebelumnya. Dari sisi produksi, pertumbuhan tertinggi pada Lapangan Usaha Pengadaan Listrik dan Gas sebesar 13,41 persen. Sementara dari sisi pengeluaran dicapai oleh Komponen Ekspor Barang dan Jasa yang tumbuh sebesar 48,53 persen.
        </p>
    </div>
</section>

<section class="ftco-section" style="background-image: linear-gradient(0deg, rgba(38, 38, 38, 0.9), rgba(102, 102, 102, 0.3)), url('<?php echo base_url(); ?>assets/utama/images/bg-blur.png'); background-size: 100%;">
    <div class="row col-lg-12 align-items-center justify-content-center mb-3 pb-5">
        <h3 style="font-weight: bold; color: white; font-size: 30px;">Data Gini Rasio</h3>
    </div>
    <div class="row col-lg-12 align-items-center justify-content-center">
        <!-- <div id="mapid2" style="height: 500px; width: 500px;"></div> -->

        <div style="padding-right: 20px;">
            <div id="map_gini_rasio" style="height: 600px; width: 600px;"></div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/maps/Peta Sultra.png" alt="Peta Sultra" width="900px" style="padding-right: 20px; padding-left: 20px;"> -->
        <div id="box">
            <div id="gini_rasio" style="width: 700px; height: 500px;"></div>
            <div class="row align-items-center justify-content-center">
                <p id="legend1">Tidak lebih baik dari capaian Nasional & Provinsi</p>
                <p id="legend2">Di antara capaian Nasional & Provinsi</p>
                <p id="legend3">Lebih baik dari capaian Nasional & Provinsi</p>
            </div>
            <p id="sumber">Sumber: BPS Provinsi Sulawesi Tenggara</p>
        </div>
        <p style="width: 450px; text-align: center; font-size: 14px; color: white; padding-left: 20px; font-family: 'Lucida Sans';">Pada September 2020, tingkat ketimpangan pengeluaran penduduk Sulawesi Tenggara yang diukur oleh Gini Ratio adalah sebesar 0,388. Angka ini menurun sebesar 0,001 poin jika dibandingkan dengan Gini Ratio Maret 2020 yang sebesar 0,389. Sementara itu jika dibandingkan dengan Gini Ratio September 2019 yang sebesar 0,393, maka Gini Ratio September 2020 turun sebesar 0,005 poin. Gini Ratio di daerah perkotaan pada September 2020 tercatat sebesar 0,403, turun dibanding Gini Ratio Maret 2020 yang sebesar 0,404 dan naik dibanding Gini Ratio September 2019 yang sebesar 0,402. Gini Ratio di daerah perdesaan pada September 2020 tercatat sebesar 0,348 naik dibanding Maret 2020 yang tercatat sebesar 0,347 dan turun dibandingkan Gini Ratio September 2019 yang sebesar 0,353. Pada September 2020, distribusi pengeluaran kelompok penduduk 40 persen terbawah adalah sebesar 17,19 persen.Artinya pengeluaran penduduk sudah berada pada kategori tingkat ketimpangan rendah. Jika dirinci menurut wilayah, di daerah perkotaan angkanya tercatat sebesar 16,58 persen yang artinya berada pada kategori ketimpangan sedang. Sementara untuk daerah perdesaan, angkanya tercatat sebesar 18,82 persen, yang berarti masuk dalam kategori ketimpangan rendah.
        </p>
    </div>
</section>

<section class="ftco-section" style="background-image: linear-gradient(0deg, rgba(38, 38, 38, 0.9), rgba(102, 102, 102, 0.3)), url('<?php echo base_url(); ?>assets/utama/images/bg-blur.png'); background-size: 100%;">
    <div class="row col-lg-12 align-items-center justify-content-center mb-3 pb-5">
        <h3 style="font-weight: bold; color: white; font-size: 30px;">Data Persentase Penduduk Miskin</h3>
    </div>
    <div class="row col-lg-12 align-items-center justify-content-center">
        <!-- <div id="mapid2" style="height: 500px; width: 500px;"></div> -->

        <div style="padding-right: 20px;">
            <div id="map_persentase_penduduk_miskin" style="height: 600px; width: 600px;"></div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/maps/Peta Sultra.png" alt="Peta Sultra" width="900px" style="padding-right: 20px; padding-left: 20px;"> -->
        <div id="box">
            <div id="persentase_penduduk_miskin" style="width: 700px; height: 500px;"></div>
            <div class="row align-items-center justify-content-center">
                <p id="legend1">Tidak lebih baik dari capaian Nasional & Provinsi</p>
                <p id="legend2">Di antara capaian Nasional & Provinsi</p>
                <p id="legend3">Lebih baik dari capaian Nasional & Provinsi</p>
            </div>
            <p id="sumber">Sumber: BPS Provinsi Sulawesi Tenggara</p>
        </div>
        <p style="width: 450px; text-align: center; font-size: 14px; color: white; padding-left: 20px; font-family: 'Lucida Sans';">Persentase Penduduk Miskin pada September 2020 sebesar 11,69 persen, naik 0,69 persen poin terhadap Maret 2020 dan naik 0,65 persen poin terhadap September 2019. Jumlah penduduk miskin pada September 2020 sebesar 317,32 ribu orang, naik 15,5 ribu orang terhadap Maret 2020 dan naik 17,35 ribu orang terhadap September 2019. Persentase penduduk miskin di daerah perkotaan pada September 2020 sebesar 7,62 persen, naik 0,48 poin terhadap Maret 2020. Sementara persentase penduduk miskin di daerah perdesaan pada September 2020 naik 0,43 poin dari Maret 2020. Dibandingkan Maret 2020, jumlah penduduk miskin September 2020 di daerah perkotaan turun sebanyak 3,71 ribu orang (dari 76,93 ribu orang pada Maret 2020 menjadi 73,22 ribu orang pada September 2020). Sementara itu, daerah perdesaan naik sebanyak 19,21 ribu orang (dari 224,89 ribu orang pada Maret 2020 menjadi 244,10 ribu orang pada September 2020). Selama periode Maret - September 2020, Garis Kemiskinan naik sebesar 3,39 persen, yaitu dari Rp 356.444,- per kapita per bulan pada Maret 2020 menjadi Rp 368.529,- per kapita per bulan pada September 2020. Pada September 2020, secara rata-rata rumah tangga miskin di Sulawesi Tenggara memiliki 5,14 orang anggota rumah tangga. Dengan demikian, besarnya Garis Kemiskinan per rumah tangga miskin secara rata-rata adalah sebesar Rp1.894.239,-/rumah tangga miskin/bulan.
        </p>
    </div>
</section>

<section class="ftco-section" style="background-image: linear-gradient(0deg, rgba(38, 38, 38, 0.9), rgba(102, 102, 102, 0.3)), url('<?php echo base_url(); ?>assets/utama/images/bg-blur.png'); background-size: 100%;">
    <div class="row col-lg-12 align-items-center justify-content-center mb-3 pb-5">
        <h3 style="font-weight: bold; color: white; font-size: 30px;">Data Indeks Pembangunan Manusia</h3>
    </div>
    <div class="row col-lg-12 align-items-center justify-content-center">
        <!-- <div id="mapid2" style="height: 500px; width: 500px;"></div> -->

        <div style="padding-right: 20px;">
            <div id="map_indeks_pembangunan_manusia" style="height: 600px; width: 600px;"></div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/maps/Peta Sultra.png" alt="Peta Sultra" width="900px" style="padding-right: 20px; padding-left: 20px;"> -->
        <div id="box">
            <div id="indeks_pembangunan_manusia" style="width: 700px; height: 500px;"></div>
            <div class="row align-items-center justify-content-center">
                <p id="legend1">Tidak lebih baik dari capaian Nasional & Provinsi</p>
                <p id="legend2">Di antara capaian Nasional & Provinsi</p>
                <p id="legend3">Lebih baik dari capaian Nasional & Provinsi</p>
            </div>
            <p id="sumber">Sumber: BPS Provinsi Sulawesi Tenggara</p>
        </div>
        <p style="width: 450px; text-align: center; font-size: 14px; color: white; padding-left: 20px; font-family: 'Lucida Sans';">Pada tahun 2020, pencapaian pembangunan manusia di tingkat Provinsi Sulawesi Tenggara cukup bervariasi. IPM pada level kabupaten/kota berkisar antara 64,37 (Buton tengah) hingga 83,53 (Kota Kendari). Pada dimensi umur panjang dan hidup sehat, umur Harapan Hidup saat lahir berkisar antara 67,66 (Buton Selatan dan Buton Tengah) hingga 73,77 (Kota Kendari). Sementara pada dimensi pengetahuan, Harapan Lama Sekolah berkisar antara 11,84 (Bombana) hingga 16,62 (Kota Kendari) serta Rata-rata Lama Sekolah berkisar antara 7,01 (Muna Barat) hingga 12,20 (Kota Kendari). Pengeluaran per kapita level kabupaten/kota berkisar antara 6.700 juta rupiah (Konawe Kepulauan) hingga 14.335 juta rupiah (Kota Kendari). Pada tahun 2020 pengeluaran perkapita mengalami penurunan dibanding tahun 2019 untuk semua kabupaten/kota se Sulawesi Tenggara akibat wabah covid-19.
            Kemajuan pembangunan manusia pada tahun 2020 juga terlihat dari status pembangunan manusia di tingkat kabupaten/kota. Jumlah kabupaten yang berstatus “tinggi” sebanyak 3 kabupaten/kota (Kabupaten Kolaka, Kabupaten Konawe, Kota Bau-Bau) dan 1 kota berstatus “sangat tinggi” yaitu Kota Kendari.
        </p>
    </div>
</section>

<section class="ftco-section" style="background-image: linear-gradient(0deg, rgba(38, 38, 38, 0.9), rgba(102, 102, 102, 0.3)), url('<?php echo base_url(); ?>assets/utama/images/bg-blur.png'); background-size: 100%;">
    <div class="row col-lg-12 align-items-center justify-content-center mb-3 pb-5">
        <h3 style="font-weight: bold; color: white; font-size: 30px;">Data Pengangguran Terbuka</h3>
    </div>
    <div class="row col-lg-12 align-items-center justify-content-center">
        <!-- <div id="mapid2" style="height: 500px; width: 500px;"></div> -->

        <div style="padding-right: 20px;">
            <div id="map_pengangguran_terbuka" style="height: 600px; width: 600px;"></div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/maps/Peta Sultra.png" alt="Peta Sultra" width="900px" style="padding-right: 20px; padding-left: 20px;"> -->
        <div id="box">
            <div id="tingkat_pengangguran_terbuka" style="width: 700px; height: 500px;"></div>
            <div class="row align-items-center justify-content-center">
                <p id="legend1">Tidak lebih baik dari capaian Nasional & Provinsi</p>
                <p id="legend2">Di antara capaian Nasional & Provinsi</p>
                <p id="legend3">Lebih baik dari capaian Nasional & Provinsi</p>
            </div>
            <p id="sumber">Sumber: BPS Provinsi Sulawesi Tenggara</p>
        </div>
        <p style="width: 450px; text-align: center; font-size: 16px; color: white; padding-left: 20px; font-family: Arial;">Tingkat Pengangguran Terbuka (TPT) Agustus 2020 sebesar 4,58 persen, naik 1,06 persen poin dibanding Agustus 2019, dan naik 1,39 persen poin dibanding Agustus 2018. Pada Agustus 2020, sebesar 64,59 persen penduduk bekerja pada kegiatan informal dan persentase pekerja informal naik 2,04 persen poin dibanding Agustus 2019. Lapangan usaha yang menyerap penduduk bekerja paling banyak adalah pertanian, kehutanan, dan perikanan, dimana persentase penduduk bekerjanya mencapai 36,71 persen pada Agustus 2020. Pada Agustus 2020, terdapat 38,84 persen penduduk bekerja tidak penuh (jam kerja kurang dari 35 jam seminggu) mencakup 10,49 persen setengah penganggur dan 28,35 persen pekerja paruh waktu.

        </p>
    </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    // function Map2() {
    var map_pertumbuhan_ekonomi = L.map('map_pertumbuhan_ekonomi', {
        center: [-4.1992344, 122.5861799],
        zoom: 8,
        mapTypeId: 'satellite',
        mapTypeIds: ['streets', 'satellite', 'topo'],
        gestureHandling: false,
        searchControl: false,
        locateControl: false,
        pegmanControl: false,
        fullscreenControl: true,
        minimapControl: false,
        preferCanvas: false,
        trackResize: true,
        attributeControl: false,
        minZoom: 8,
        dragging: false,
        // maxZoom: 18,
        maxZoom: 8,
        visualClick: false,
        //disableDefaultUI: false,
        layersControl: false,
        plugins: [
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
        ]
    });
    var kmz = L.kmzLayer().addTo(map_pertumbuhan_ekonomi);

    kmz.on('load', function(e) {
        // control.addOverlay(e.layer, e.name);
        e.layer.addTo(map_pertumbuhan_ekonomi);
    });
    kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
    kmz.load("<?php echo base_url(); ?>assets/maps/PE.kmz");

    var map_gini_rasio = L.map('map_gini_rasio', {
        center: [-4.1992344, 122.5861799],
        zoom: 8,
        mapTypeId: 'satellite',
        mapTypeIds: ['streets', 'satellite', 'topo'],
        gestureHandling: false,
        searchControl: false,
        locateControl: false,
        pegmanControl: false,
        fullscreenControl: true,
        minimapControl: false,
        preferCanvas: false,
        trackResize: true,
        attributeControl: false,
        minZoom: 8,
        dragging: false,
        // maxZoom: 18,
        maxZoom: 8,
        visualClick: false,
        //disableDefaultUI: false,
        layersControl: false,
        plugins: [
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
        ]
    });
    var kmz = L.kmzLayer().addTo(map_gini_rasio);

    kmz.on('load', function(e) {
        // control.addOverlay(e.layer, e.name);
        e.layer.addTo(map_gini_rasio);
    });
    kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
    kmz.load("<?php echo base_url(); ?>assets/maps/GR.kmz");

    var map_persentase_penduduk_miskin = L.map('map_persentase_penduduk_miskin', {
        center: [-4.1992344, 122.5861799],
        zoom: 8,
        mapTypeId: 'satellite',
        mapTypeIds: ['streets', 'satellite', 'topo'],
        gestureHandling: false,
        searchControl: false,
        locateControl: false,
        pegmanControl: false,
        fullscreenControl: true,
        minimapControl: false,
        preferCanvas: false,
        trackResize: true,
        attributeControl: false,
        minZoom: 8,
        dragging: false,
        // maxZoom: 18,
        maxZoom: 8,
        visualClick: false,
        //disableDefaultUI: false,
        layersControl: false,
        plugins: [
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
        ]
    });
    var kmz = L.kmzLayer().addTo(map_persentase_penduduk_miskin);

    kmz.on('load', function(e) {
        // control.addOverlay(e.layer, e.name);
        e.layer.addTo(map_persentase_penduduk_miskin);
    });
    kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
    kmz.load("<?php echo base_url(); ?>assets/maps/PPM_2020.kmz");

    var map_indeks_pembangunan_manusia = L.map('map_indeks_pembangunan_manusia', {
        center: [-4.1992344, 122.5861799],
        zoom: 8,
        mapTypeId: 'satellite',
        mapTypeIds: ['streets', 'satellite', 'topo'],
        gestureHandling: false,
        searchControl: false,
        locateControl: false,
        pegmanControl: false,
        fullscreenControl: true,
        minimapControl: false,
        preferCanvas: false,
        trackResize: true,
        attributeControl: false,
        minZoom: 8,
        dragging: false,
        // maxZoom: 18,
        maxZoom: 8,
        visualClick: false,
        //disableDefaultUI: false,
        layersControl: false,
        plugins: [
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
        ]
    });
    var kmz = L.kmzLayer().addTo(map_indeks_pembangunan_manusia);

    kmz.on('load', function(e) {
        // control.addOverlay(e.layer, e.name);
        e.layer.addTo(map_indeks_pembangunan_manusia);
    });
    kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
    kmz.load("<?php echo base_url(); ?>assets/maps/IPM.kmz");

    var map_pengangguran_terbuka = L.map('map_pengangguran_terbuka', {
        center: [-4.1992344, 122.5861799],
        zoom: 8,
        mapTypeId: 'satellite',
        mapTypeIds: ['streets', 'satellite', 'topo'],
        gestureHandling: false,
        searchControl: false,
        locateControl: false,
        pegmanControl: false,
        fullscreenControl: true,
        minimapControl: false,
        preferCanvas: false,
        trackResize: true,
        attributeControl: false,
        minZoom: 8,
        dragging: false,
        // maxZoom: 18,
        maxZoom: 8,
        visualClick: false,
        //disableDefaultUI: false,
        layersControl: false,
        plugins: [
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
            "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
        ]
    });
    var kmz = L.kmzLayer().addTo(map_pengangguran_terbuka);

    kmz.on('load', function(e) {
        // control.addOverlay(e.layer, e.name);
        e.layer.addTo(map_pengangguran_terbuka);
    });
    kmz.load("<?php echo base_url(); ?>assets/maps/KMLHill.kmz");
    kmz.load("<?php echo base_url(); ?>assets/maps/TPT.kmz");

</script>

<?php
$data_pe = "";
$data_gr = "";
$data_ppm = "";
$data_ipm = "";
$data_tpt = "";
foreach ($pertumbuhan_ekonomi as $pe) {
    if ($pe->data_pertumbuhan_ekonomi > -2.07 && $pe->data_pertumbuhan_ekonomi > -0.65) {
        $data_pe .= "['" . $pe->wilayah . "', " . $pe->data_pertumbuhan_ekonomi . ", 'color: green'],";
    } else if ($pe->data_pertumbuhan_ekonomi > -2.07 && $pe->data_pertumbuhan_ekonomi < -0.65) {
        $data_pe .= "['" . $pe->wilayah . "', " . $pe->data_pertumbuhan_ekonomi . ", 'color: yellow'],";
    } else if ($pe->data_pertumbuhan_ekonomi < -2.07) {
        $data_pe .= "['" . $pe->wilayah . "', " . $pe->data_pertumbuhan_ekonomi . ", 'color: red'],";
    } else {
        $data_pe .= "['" . $pe->wilayah . "', " . $pe->data_pertumbuhan_ekonomi . ", 'NULL'],";
    }
}
foreach ($gini_rasio as $gr) {
    if ($gr->data_gini_rasio > 0.385 && $gr->data_gini_rasio > 0.388) {
        $data_gr .= "['" . $gr->wilayah . "', " . $gr->data_gini_rasio . ", 'color: red'],";
    } else if ($gr->data_gini_rasio > 0.385 && $gr->data_gini_rasio < 0.388) {
        $data_gr .= "['" . $gr->wilayah . "', " . $gr->data_gini_rasio . ", 'color: yellow'],";
    } else if ($gr->data_gini_rasio < 0.385) {
        $data_gr .= "['" . $gr->wilayah . "', " . $gr->data_gini_rasio . ", 'color: green'],";
    } else {
        $data_gr .= "['" . $gr->wilayah . "', " . $gr->data_gini_rasio . ", 'NULL'],";
    }
}
foreach ($persentase_penduduk_miskin as $ppm) {
    if ($ppm->data_persentase_penduduk_miskin > 10.19 && $ppm->data_persentase_penduduk_miskin > 11.69) {
        $data_ppm .= "['" . $ppm->wilayah . "', " . $ppm->data_persentase_penduduk_miskin . ", 'color: red'],";
    } else if ($ppm->data_persentase_penduduk_miskin > 10.19 && $ppm->data_persentase_penduduk_miskin < 11.69) {
        $data_ppm .= "['" . $ppm->wilayah . "', " . $ppm->data_persentase_penduduk_miskin . ", 'color: yellow'],";
    } else if ($ppm->data_persentase_penduduk_miskin < 10.19) {
        $data_ppm .= "['" . $ppm->wilayah . "', " . $ppm->data_persentase_penduduk_miskin . ", 'color: green'],";
    } else {
        $data_ppm .= "['" . $ppm->wilayah . "', " . $ppm->data_persentase_penduduk_miskin . ", 'NULL'],";
    }
}
foreach ($indeks_pembangunan_manusia as $ipm) {
    if ($ipm->data_indeks_pembangunan_manusia > 71.94 && $ipm->data_indeks_pembangunan_manusia > 71.45) {
        $data_ipm .= "['" . $ipm->wilayah . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'color: green'],";
    } else if ($ipm->data_indeks_pembangunan_manusia < 71.94 && $ipm->data_indeks_pembangunan_manusia > 71.45) {
        $data_ipm .= "['" . $ipm->wilayah . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'color: yellow'],";
    } else if ($ipm->data_indeks_pembangunan_manusia < 71.45) {
        $data_ipm .= "['" . $ipm->wilayah . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'color: red'],";
    } else {
        $data_ipm .= "['" . $ipm->wilayah . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'NULL'],";
    }
}
foreach ($tingkat_pengangguran_terbuka as $tpt) {
    if ($tpt->data_tingkat_pengangguran_terbuka > 7.07 && $tpt->data_tingkat_pengangguran_terbuka > 4.58) {
        $data_tpt .= "['" . $tpt->wilayah . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'color: red'],";
    } else if ($tpt->data_tingkat_pengangguran_terbuka < 7.07 && $tpt->data_tingkat_pengangguran_terbuka > 4.58) {
        $data_tpt .= "['" . $tpt->wilayah . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'color: yellow'],";
    } else if ($tpt->data_tingkat_pengangguran_terbuka < 4.58) {
        $data_tpt .= "['" . $tpt->wilayah . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'color: green'],";
    } else {
        $data_tpt .= "['" . $tpt->wilayah . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'NULL'],";
    }
}
// echo $data_gr;
?>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);
    google.charts.setOnLoadCallback(drawChart4);
    google.charts.setOnLoadCallback(drawChart5);

    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Provinsi/Nasional', 'Pertumbuhan Ekonomi', {
                role: 'style',
            }, ],
            <?php
            echo $data_pe;
            ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation'
        }, 2]);

        var options = {
            title: 'Data Pertumbuhan Ekonomi Provinsi Sulawesi Tenggara menurut Kabupaten/Kota Tahun 2020 (%)',
            colors: ['black'],
            curveType: 'function',
            pointSize: 10,
            annotation: {
                1: {
                    style: 'none'
                }
            },
            legend: 'bottom',
            backgroundColor: 'transparent'
        };

        var chart = new google.visualization.BarChart(document.getElementById("pertumbuhan_ekonomi"));
        chart.draw(view, options);
        // var chart = new google.visualization.LineChart(document.getElementById('pertumbuhan_ekonomi'));

        // chart.draw(view, options);
    }

    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Provinsi/Nasional', 'Gini Rasio', {
                role: 'style',
            }, ],
            <?php echo $data_gr; ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation'
        }, 2]);

        var options = {
            title: 'Data Gini Rasio Provinsi Sulawesi Tenggara menurut Kabupaten/Kota Tahun 2020 (Nilai)',
            colors: ['black'],
            curveType: 'function',
            pointSize: 10,
            annotation: {
                1: {
                    style: 'none'
                }
            },
            legend: 'bottom',
            backgroundColor: 'transparent'
        };
        var chart = new google.visualization.BarChart(document.getElementById("gini_rasio"));
        // var chart = new google.visualization.LineChart(document.getElementById('gini_rasio'));

        chart.draw(view, options);
    }

    function drawChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Provinsi/Nasional', 'Persentase Penduduk Miskin', {
                role: 'style',
            }, ],
            <?php echo $data_ppm; ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation'
        }, 2]);

        var options = {
            title: 'Data Persentase Penduduk Miskin Provinsi Sulawesi Tenggara menurut Kabupaten/Kota Tahun 2020',
            colors: ['black'],
            curveType: 'function',
            pointSize: 10,
            annotation: {
                1: {
                    style: 'none'
                }
            },
            legend: 'bottom',
            backgroundColor: 'transparent'
        };
        var chart = new google.visualization.BarChart(document.getElementById("persentase_penduduk_miskin"));
        // var chart = new google.visualization.LineChart(document.getElementById('persentase_penduduk_miskin'));

        chart.draw(view, options);
    }

    function drawChart4() {
        var data = google.visualization.arrayToDataTable([
            ['Provinsi/Nasional', 'Indeks Pembangunan Manusia', {
                role: 'style',
            }, ],
            <?php echo $data_ipm; ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation'
        }, 2]);

        var options = {
            title: 'Data Indeks Pembangunan Manusia Provinsi Sulawesi Tenggara menurut Kabupaten/Kota Tahun 2020',
            colors: ['black'],
            curveType: 'function',
            pointSize: 10,
            annotation: {
                1: {
                    style: 'none'
                }
            },
            legend: 'bottom',
            backgroundColor: 'transparent'
        };
        var chart = new google.visualization.BarChart(document.getElementById("indeks_pembangunan_manusia"));
        // var chart = new google.visualization.LineChart(document.getElementById('indeks_pembangunan_manusia'));

        chart.draw(view, options);
    }

    function drawChart5() {
        var data = google.visualization.arrayToDataTable([
            ['Provinsi/Nasional', 'Tingkat Pengangguran Terbuka', {
                role: 'style',
            }, ],
            <?php echo $data_tpt; ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation'
        }, 2]);

        var options = {
            title: 'Data Tingkat Pengangguran Terbuka Provinsi Sulawesi Tenggara menurut Kabupaten/Kota Tahun 2020',
            colors: ['black'],
            curveType: 'function',
            pointSize: 10,
            annotation: {
                1: {
                    style: 'none'
                }
            },
            legend: 'bottom',
            backgroundColor: 'transparent'
        };
        var chart = new google.visualization.BarChart(document.getElementById("tingkat_pengangguran_terbuka"));
        // var chart = new google.visualization.LineChart(document.getElementById('tingkat_pengangguran_terbuka'));

        chart.draw(view, options);
    }
</script>