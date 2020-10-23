<div class="recent_event_area my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-35">
                    <?php foreach ($alb->result() as $row) : ?>
                        <h3 class="mb-45"><?= $row->album_nama ?></h3>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-top-border">
                    <div class="row gallery-item">

                        <?php foreach ($data->result() as $row) : ?>
                            <div class="col-md-4">
                                <a href="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>);"></div>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>