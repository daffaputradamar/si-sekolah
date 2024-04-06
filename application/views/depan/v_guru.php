<?php 
function UR_exists($url)
{
    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? true : false;
}
?>
<div class="popular_program_area my-5">
    <div class="container">
        <h1 class="text-dark mb-5">Daftar Guru & Staff SMA Negeri 1 Bayat</h1>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row align-items-stretch">



                    <?php foreach ($data->result() as $row) : ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-5">
                            <!-- <div class="single__program h-100">
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
                            </div> -->
                            <div class="card mr-1 border-0 mr-4 h-100" style="
                                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.05);
                                border-radius: 6px;
                                ">
                                <?php if (empty($row->guru_photo)) : ?>
                                    <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="card-img-top" alt="<?php echo $row->guru_nama; ?>">
                                <?php else : ?>
                                    <img src="<?php echo UR_exists(base_url() . 'assets/images/' . $row->guru_photo) ? base_url() . 'assets/images/' . $row->guru_photo : base_url() . 'assets/images/Image_not_available.png'; ?>" alt="<?php echo $row->guru_nama; ?>" class="card-img-top img-fluid" style="border-radius: 18px; object-fit: cover;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class=""><?= $row->guru_nama; ?></h5>
                                    <p class="mt-2 mb-0 text-secondary small"><?= $row->jabatan ?></p>
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