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
                <div class="col-md-12">
                    <div class="card">
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $page_name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                            <select name="kota_kabupaten" class="form-control select2bs4" style="width: 15%;">
                                <option value="">Kendari</option>
                                <option value="">Konawe</option>
                            </select>
                            </div>
                            <!-- <a href="<?php echo site_url('admin/program_sultra/input_program'); ?>" class="btn-sm btn-primary">Input Data</a> -->

                            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/leaflet/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
                            <!-- Make sure you put this AFTER Leaflet's CSS -->
                            <script src="<?php echo base_url(); ?>assets/leaflet/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

                            <!-- Leaflet -->
                            <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js"></script>
                            <script src="https://unpkg.com/leaflet-ui@0.4.5/dist/leaflet-ui-src.js"></script>
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
                            <style>
                                #mapid {
                                    height: 800px;
                                }
                            </style>
                            <div id="mapid"></div>

                            <script>
                                map = L.map('mapid', {
                                    center: [-4.00009925001936, 122.5142745973001],
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
                                    trackResize: true,
                                    attributeControl: false,
                                    minZoom: 11,
                                    maxZoom: 17,
                                    visualClick: false,
                                    //disableDefaultUI: false,
                                    //layersControl: false,
                                    plugins: [
                                        "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.css",
                                        "@raruto/leaflet-elevation@1.3.x/dist/leaflet-elevation.js"
                                    ]
                                });
                            </script>

                        </div>

    </section>
</div>