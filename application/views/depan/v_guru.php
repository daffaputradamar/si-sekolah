<div class="popular_program_area my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center">
                    <h3>DAFTAR GURU & STAF</h3>
                    <p>Daftar Guru & Staf Sekolah Di SMA Negeri 1 Bayat - Klaten</p>
                    <br><br>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row align-items-stretch">



                    <?php foreach ($data->result() as $row) : ?>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="single__program h-100">
                                <div class="program_thumb">
                                    <?php if (empty($row->guru_photo)) : ?>
                                        <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="card-img-top" alt="<?php echo $row->guru_nama; ?>">
                                    <?php else : ?>
                                        <img src="<?php echo base_url() . 'assets/images/' . $row->guru_photo; ?>" class="card-img-top" alt="<?php echo $row->guru_nama; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="program__content h-50">
                                    <h6><?php echo $row->jabatan; ?></h6>
                                    <h4><?php echo $row->guru_nama; ?></h4>
                                    <br>
                                    <span>NIP : <?php echo empty($row->guru_nip) ? '-' : $row->guru_nip; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>

                <nav><?php echo $page; ?></nav>


            </div>



        </div>


    </div>
</div>