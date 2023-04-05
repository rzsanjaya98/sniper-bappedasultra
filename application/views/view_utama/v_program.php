<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url(); ?>assets/utama/images/perpus.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $page_name; ?><i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread"><?php echo "<b>Pilar</b> ".$page_name; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <?php
        $no = 0;
        $tutup = 0;
        ?>
        <div class="row mb-5 pb-5">
            <?php foreach ($program_sultra as $program) : ?>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                    <div class="d-block services text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span><?php echo $no+1; ?></span>
                        </div>
                        <div class="media-body p-4">
                            <h3 class="heading"><?php echo $program->kategori; ?></h3>
                            <p><?php echo $program->nama_program; ?></p>
                            <a href="<?php echo site_url('program/kegiatan/').$program->id_opd.'/'.$program->id_jenis_urusan.'/'.$program->id_bidang_urusan.'/'.$program->id_program; ?>" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                        </div>
                    </div>
                </div>
            <?php $no++;
                if ($no % 3 == 0) {
                    echo "</div>";
                    echo "<div class='row mb-5 pb-5'>";
                    $tutup++;
                }
            endforeach;
            for($i=0; $i<$tutup; $i++){
                echo "</div>";
            }
            ?>
            <!-- <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-dog-eating"></span>
                    </div>
                    <div class="media-body p-4">
                        <h3 class="heading">Pet Daycare</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-grooming"></span>
                    </div>
                    <div class="media-body p-4">
                        <h3 class="heading">Pet Grooming</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
        <!-- <div class="row mb-5 pb-5">
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span>1</span>
                    </div>
                    <div class="media-body p-4">
                        <h3 class="heading">Dog Walking</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-dog-eating"></span>
                    </div>
                    <div class="media-body p-4">
                        <h3 class="heading">Pet Daycare</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-grooming"></span>
                    </div>
                    <div class="media-body p-4">
                        <h3 class="heading">Pet Grooming</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>