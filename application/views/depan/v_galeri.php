<div class="recent_event_area my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-35">
                    <h3 class="mb-45">GALERI KEGIATAN SEKOLAH</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-top-border">
                    <div class="row gallery-item">

                        <?php foreach ($all_alb->result() as $row) : ?>
                            <!-- <div class="col-md-4">
                                <a href="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>);"></div>
                                </a>
                            </div> -->
                            <div class="col-md-4 col-sm-6">
                                <div class="card"">
                                    <img class=" card-img-top" src="<?php echo base_url() . 'assets/images/' . $row->album_cover; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text mb-4"><?= $row->album_nama ?></h5>
                                        <div class="text-center">
                                            <a href="<?= site_url('galeri/album/' . $row->album_id) ?>" class="btn btn-outline-primary">Lihat Album</a>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Jumlah: <?= $row->album_count ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>