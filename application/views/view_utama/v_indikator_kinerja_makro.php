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
    <!-- <div style="padding-left: 100px; padding-right: 100px;"> -->
    <div class="container">
        <!-- Leaflet -->

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js"></script>
        <script src="https://unpkg.com/leaflet-ui@0.4.5/dist/leaflet-ui-src.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
        <style>
            #mapid {
                height: 1000px;
                /* width: 1500px; */
                /* padding-left: 15px;
                padding-right: 15px; */

            }
            .grafik {
                padding-left: 20px;
                padding-right: 20px;
                display: flex;
                float: left;
            }

        </style>
        <div class="row align-items-center justify-content-center"><img src="<?php echo base_url(); ?>assets/utama/images/indikator_makro.jpg"></div>
        <!-- <div id="mapid"></div> -->

        <script>
            map = L.map('mapid', {
                center: [-2.60798629, 122.04122713, 153.98688492],
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
                // trackResize: true,
                attributeControl: false,
                minZoom: 7,
                // maxZoom: 18,
                maxZoom: 7,
                visualClick: false,
                //disableDefaultUI: false,
                layersControl: false,
                plugins: [
                    "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
                    "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
                ]
            });
            // map.setView([-2.60798629, 122.04122713, 153.98688492], 7);

            var kmz = L.kmzLayer().addTo(map);

            kmz.on('load', function(e) {
                // control.addOverlay(e.layer, e.name);
                e.layer.addTo(map);
            });
            kmz.load("<?php echo base_url(); ?>assets/maps/regional_sulawesi.kmz");
            //   var control = L.control.layers(null, null, { collapsed:false }).addTo(map);
        </script>

    </div>
</section>

<section class="ftco-section testimony-section">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="container col-md-12">
        <div class="row justify-content-center pb-3">
            <div class="grafik">
                <div id="pertumbuhan_ekonomi" style="width: 850px; height: 400px"></div>
            </div>
            <div class="grafik">
                <div id="gini_rasio" style="width: 850px; height: 400px"></div>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="grafik">
                <div id="persentase_penduduk_miskin" style="width: 850px; height: 400px"></div>
            </div>
            <div class="grafik">
                <div id="indeks_pembangunan_manusia" style="width: 850px; height: 400px"></div>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="grafik">
                <div id="tingkat_pengangguran_terbuka" style="width: 850px; height: 400px"></div>
            </div>
        </div>
    </div>

    <?php
    $data_pe = "";
    $data_gr = "";
    $data_ppm = "";
    $data_ipm = "";
    $data_tpt = "";
    foreach ($pertumbuhan_ekonomi as $pe) {
        if ($pe->data_pertumbuhan_ekonomi > -2.07) {
            $data_pe .= "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'color: green'],";
        } else if ($pe->data_pertumbuhan_ekonomi < -2.07) {
            $data_pe .= "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'color: red'],";
        } else {
            $data_pe .= "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'NULL'],";
        }
    }
    foreach ($gini_rasio as $gr) {
        if ($gr->data_gini_rasio > 0.385) {
            $data_gr .= "['" . $gr->provinsi_nasional . "', " . $gr->data_gini_rasio . ", 'point { fill-color: green; }'],";
        } else if ($gr->data_gini_rasio < 0.385) {
            $data_gr .= "['" . $gr->provinsi_nasional . "', " . $gr->data_gini_rasio . ", 'point { fill-color: red; }'],";
        } else {
            $data_gr .= "['" . $gr->provinsi_nasional . "', " . $gr->data_gini_rasio . ", 'NULL'],";
        }
    }
    foreach ($persentase_penduduk_miskin as $ppm) {
        if ($ppm->data_persentase_penduduk_miskin > 10.19) {
            $data_ppm .= "['" . $ppm->provinsi_nasional . "', " . $ppm->data_persentase_penduduk_miskin . ", 'color: green'],";
        } else if ($ppm->data_persentase_penduduk_miskin < 10.19) {
            $data_ppm .= "['" . $ppm->provinsi_nasional . "', " . $ppm->data_persentase_penduduk_miskin . ", 'color: red'],";
        } else {
            $data_ppm .= "['" . $ppm->provinsi_nasional . "', " . $ppm->data_persentase_penduduk_miskin . ", 'NULL'],";
        }
    }
    foreach ($indeks_pembangunan_manusia as $ipm) {
        if ($ipm->data_indeks_pembangunan_manusia > 71.94) {
            $data_ipm .= "['" . $ipm->provinsi_nasional . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'point { fill-color: green; }'],";
        } else if ($ipm->data_indeks_pembangunan_manusia < 71.94) {
            $data_ipm .= "['" . $ipm->provinsi_nasional . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'point { fill-color: red; }'],";
        } else {
            $data_ipm .= "['" . $ipm->provinsi_nasional . "', " . $ipm->data_indeks_pembangunan_manusia . ", 'NULL'],";
        }
    }
    foreach ($tingkat_pengangguran_terbuka as $tpt) {
        if ($tpt->data_tingkat_pengangguran_terbuka > 7.07) {
            $data_tpt .= "['" . $tpt->provinsi_nasional . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'point { fill-color: green; }'],";
        } else if ($tpt->data_tingkat_pengangguran_terbuka < 7.07) {
            $data_tpt .= "['" . $tpt->provinsi_nasional . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'point { fill-color: red; }'],";
        } else {
            $data_tpt .= "['" . $tpt->provinsi_nasional . "', " . $tpt->data_tingkat_pengangguran_terbuka . ", 'NULL'],";
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
                // foreach ($pertumbuhan_ekonomi as $pe) {
                //     if ($pe->data_pertumbuhan_ekonomi > -2.07) {
                //         echo "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'point { fill-color: green; }'],";
                //     } else if ($pe->data_pertumbuhan_ekonomi < -2.07) {
                //         echo "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'point { fill-color: red; }'],";
                //     } else {
                //         echo "['" . $pe->provinsi_nasional . "', " . $pe->data_pertumbuhan_ekonomi . ", 'NULL'],";
                //     }
                // }
                ?>
                // ['2004', 1000, 400],
                // ['2005', 1170, 460],
                // ['2006', 660, 1120],
                // ['2007', 1030, 540]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                calc: 'stringify',
                sourceColumn: 1,
                type: 'string',
                role: 'annotation'

            }, 2]);

            var options = {
                title: 'Data Pertumbuhan Ekonomi Regional Sulawesi Tahun 2020 (%)',
                colors: ['black'],
                curveType: 'function',
                pointSize: 10,
                annotations: {
                    textStyle: {
                        // fontName: 'Times-Roman',
                        fontSize: 16,
                        // bold: true,
                        // italic: true,
                        // color: '#871b47', // The color of the text.
                        // auraColor: '#d799ae', // The color of the text outline.
                        // opacity: 0.8 // The transparency of the text.
                    }
                },
                // annotations: {
                //     1: {
                //         style: 'none'
                //     }
                // },
                backgroundColor: '#bcfbfb',
                // legend: 'bottom',
                legend: 'none',

            };
            // var chart = new google.charts.Line(document.getElementById('pe'));

            // chart.draw(data, google.charts.Line.convertOptions(options));
            var chart = new google.visualization.BarChart(document.getElementById("pertumbuhan_ekonomi"));

            chart.draw(view, options);
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
                title: 'Data Gini Rasio Regional Sulawesi Tahun 2020 (Nilai)',
                colors: ['black'],
                curveType: 'function',
                pointSize: 10,
                annotation: {
                    1: {
                        style: 'none'
                    }
                },
                annotations: {
                    textStyle: {
                        fontSize: 16,
                    }
                },
                backgroundColor: '#f8f480',
                // legend: 'bottom',
                legend: 'none',
            };
            var chart = new google.visualization.LineChart(document.getElementById('gini_rasio'));

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
                title: 'Data Persentase Penduduk Miskin Regional Sulawesi Tahun 2020',
                titleTextStyle: { color: '#FFF' },
                colors: ['black'],
                curveType: 'function',
                pointSize: 10,
                annotation: {
                    1: {
                        style: 'none'
                    }
                },
                annotations: {
                    textStyle: {
                        fontSize: 16,
                    }
                },
                backgroundColor: '#a6c7d8',
                // legend: 'bottom',
                legend: 'none',
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('persentase_penduduk_miskin'));

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
                title: 'Data Indeks Pembangunan Manusia Regional Sulawesi Tahun 2020',
                titleTextStyle: { color: '#FFF' },
                colors: ['black'],
                curveType: 'function',
                pointSize: 10,
                annotation: {
                    1: {
                        style: 'none'
                    }
                },
                annotations: {
                    textStyle: {
                        fontSize: 16,
                    }
                },
                backgroundColor: '#fbab83',
                // legend: 'bottom',
                legend: 'none',
            };
            var chart = new google.visualization.LineChart(document.getElementById('indeks_pembangunan_manusia'));

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
                title: 'Data Tingkat Pengangguran Terbuka Regional Sulawesi Tahun 2020',
                colors: ['black'],
                curveType: 'function',
                pointSize: 10,
                annotation: {
                    1: {
                        style: 'none'
                    }
                },
                annotations: {
                    textStyle: {
                        fontSize: 16,
                    }
                },
                backgroundColor: '#d8caf1',
                // legend: 'bottom',
                legend: 'none',
            };
            var chart = new google.visualization.LineChart(document.getElementById('tingkat_pengangguran_terbuka'));

            chart.draw(view, options);
        }
    </script>

</section>