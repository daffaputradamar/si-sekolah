<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

function UR_exists($url)
{
    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? true : false;
}
?>


<div class="recent_news_area mt-5">
    <div class="container">
        <section class="mb-5">
            <div class="slick-carousel">
                <?php
                $i = 0;
                foreach ($berita->result() as $highlight_berita) :
                ?>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-7 col-sm-12">
                            <img src="<?php echo UR_exists(base_url() . 'assets/images/' . $highlight_berita->tulisan_gambar) ? base_url() . 'assets/images/' . $highlight_berita->tulisan_gambar : base_url() . 'assets/images/Image_not_available.png'; ?>" alt="<?php echo $highlight_berita->tulisan_judul; ?>" style="border-radius: 12px; min-height: 450px; max-width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <h3 class="mb-4">
                                <?= $highlight_berita->tulisan_judul; ?>
                            </h3>
                            <button class="btn btn-primary px-4" style="border-radius: 18px;">Baca Berita</button>
                        </div>
                    </div>
                <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </section>

        <section class="my-6 row d-flex align-items-center justify-content-between">
            <div class="col-md-6">
                <h3 class="mb-4">
                    Tentang Sekolah
                </h3>
                <p>SMA Negeri 1 Bayat, Klaten, menawarkan pendidikan berkualitas dengan fokus pada pengembangan karakter
                    siswa melalui kurikulum beragam dan kegiatan ekstrakurikuler yang mendukung. Kami bertujuan untuk
                    menjadi lembaga pendidikan unggulan yang menghasilkan pemimpin berkualitas dan berdaya saing global.
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <img src="<?php echo UR_exists(base_url() . 'assets/images/' . 'b72ea29017f0a9cdc6eba0324f263b92.png') ? base_url() . 'assets/images/' . 'b72ea29017f0a9cdc6eba0324f263b92.png' : base_url() . 'assets/images/Image_not_available.png'; ?>" alt="gambar sekolah" width="550px" height="400px" style="border-radius: 18px; object-fit: cover; box-shadow: 10px -10px 0px 0px rgba(0, 0, 244, 0.15);
" class="ml-5">
            </div>

            <div class="container-image mt-5">
                <div style="
                    background-image: url(<?= base_url() . 'assets/images/' . 'b72ea29017f0a9cdc6eba0324f263b92.png' ?>);
                    " 
                    class="container-image-content h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-4 text-center border-right" style="z-index: 2; box-shadow: 2px 0 rgba(0, 0, 0, 0.15);">
                        <h1 class="text-white display-4 font-weight-bold text-shadow"><?= $tot_siswa ?></h1>
                        <p class="text-white mt-3 text-shadow">Total Siswa</p>
                    </div>
                        <div class="col-4 text-center border-right" style="z-index: 2; box-shadow: 2px 0 rgba(0, 0, 0, 0.15);">
                        <h1 class="text-white display-4 font-weight-bold text-shadow"><?= $tot_guru ?></h1>
                        <p class="text-white mt-3 text-shadow">Total Guru</p>
                    </div>
                        <div class="col-4 text-center" style="z-index: 2;">
                        <h1 class="text-white display-4 font-weight-bold text-shadow"><?= $tot_agenda ?></h1>
                        <p class="text-white mt-3 text-shadow">Total Agenda</p>
                    </div>
                    </div>
                </div>
                <div class="container-image-overlay"></div>
            </div>
        </section>

        <section>
            <div class="mb-4 d-flex justify-content-between">
                <h1>Berita Sekolah</h1>
                <a class="btn btn-link text-primary d-flex align-items-center" href="<?php echo site_url('blog'); ?>">
                    <span class="mr-2">Lihat semua berita</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg></a>
            </div>
            <div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <?php
                    $i = 0;
                    foreach ($kategori->result() as $row) :
                    ?>
                        <li class="nav-item border">
                            <a class="nav-link font-weight-normal <?= ($i == 0) ? 'active rounded-left' : ''; ?>" id="pills-<?= $row->kategori_id ?>-tab" data-toggle="pill" href="#pills-<?= $row->kategori_id ?>" role="tab" aria-controls="pills-<?= $row->kategori_id ?>" aria-selected="true"><?= $row->kategori_nama ?></a>
                        </li>
                    <?php
                        $i++;
                    endforeach;
                    ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php
                    $i = 0;
                    foreach ($kategori->result() as $cat) : ?>
                        <div class="tab-pane fade show <?= ($i == 0) ? 'active' : ''; ?>" id="pills-<?= $cat->kategori_id ?>" role="tabpanel" aria-labelledby="pills-<?= $cat->kategori_id ?>-tab">
                            <div class="row">
                                <?php
                                $berita_cats = $controller->get_all_tulisan_by_category($cat->kategori_id);
                                if (empty($berita_cats)) :
                                ?>
                                    <div class="col-12 text-center my-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <span>Data Tidak dapat ditemukan</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                else :

                                    foreach ($berita_cats as $berita_cat) :
                                    ?>
                                        <div class="col-md-4">
                                            <div class="card mb-4" style="height: 450px;">
                                                <img src="<?php echo UR_exists(base_url() . 'assets/images/' . $berita_cat->tulisan_gambar) ? base_url() . 'assets/images/' . $berita_cat->tulisan_gambar : base_url() . 'assets/images/Image_not_available.png'; ?>" alt="<?php echo $berita_cat->tulisan_judul; ?>" class="card-img-top p-2" style="border-radius: 18px; height: 200px; object-fit: cover;">
                                                <div class="card-body d-flex flex-column justify-content-between align-items-start">
                                                    <div>
                                                        <p class="badge badge-<?= $berita_cat->color_type ?> py-1 px-2 mb-2 roboto-regular">
                                                            <?php echo $berita_cat->tulisan_kategori_nama; ?></p>
                                                        <div class="mb-1">
                                                            <small class="text-muted"><?php echo $berita_cat->tanggal; ?></small>
                                                            <small class="text-muted"> - <?php echo $berita_cat->tulisan_author; ?></small>
                                                        </div>
                                                        <h5><?php echo $berita_cat->tulisan_judul; ?></h5>
                                                    </div>
                                                    <button class="btn btn-outline-primary btn-sm px-3 mt-3 d-flex align-items-center justify-content-center" style="border-radius: 18px;">
                                                        Baca Berita
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                                                        </svg></button>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach;
                    ?>
                </div>
            </div>

        </section>
    </div>
</div>
<!--/ service_area_start  -->

<!-- popular_program_area_start  -->
<div class="popular_program_area">
    <div class="container">
        <section class="my-6">
            <div class="mb-4 d-flex justify-content-between">
                <h1>Informasi Sekolah</h1>
                <a class="btn btn-link text-primary d-flex align-items-center" href="<?php echo site_url('pengumuman'); ?>">
                    <span class="mr-2">Lihat semua informasi</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg></a>
            </div>
            <div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item border bg-white">
                        <a class="nav-link font-weight-normal active" id="pills-pengumuman-tab" data-toggle="pill" href="#pills-pengumuman" role="tab" aria-controls="pills-pengumuman" aria-selected="true">Pengumuman</a>
                    </li>
                    <li class="nav-item border bg-white">
                        <a class="nav-link font-weight-normal" id="pills-agenda-tab" data-toggle="pill" href="#pills-agenda" role="tab" aria-controls="pills-agenda" aria-selected="true">Agenda</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pengumuman" role="tabpanel" aria-labelledby="pills-pengumuman-tab">
                        <div class="row">
                            <?php
                            $pengumuman = $pengumuman->result();
                            if (empty($pengumuman)) :
                            ?>
                                <div class="col-12 text-center my-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <span>Data Tidak dapat ditemukan</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            else :

                                foreach ($pengumuman as $row) :
                                    $date = new DateTime($row->pengumuman_tanggal);
                                ?>
                                    <div class="col-md-4">
                                        <div class="card mb-4" style="height: 350px;">
                                            <div class="card-body">
                                                <div class="mb-1 w-100 d-flex justify-content-between align-items-center">
                                                    <p class="text-muted"><?= $date->format('d M Y'); ?></p>
                                                    <p class="text-muted"><?= $date->format('H:i'); ?></p>
                                                </div>
                                                <h5 class="mt-4"><?= $row->pengumuman_judul; ?></h5>
                                                <p class="mt-3 text-secondary"><?= $row->pengumuman_deskripsi ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pills-agenda" role="tabpanel" aria-labelledby="pills-agenda-tab">
                        <div class="row">
                            <?php
                            $agenda = $agenda->result();
                            if (empty($agenda)) :
                            ?>
                                <div class="col-12 text-center my-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <span>Data Tidak dapat ditemukan</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            else :

                                foreach ($agenda as $row) :
                                    $date = new DateTime($row->agenda_tanggal);
                                ?>
                                    <div class="col-md-6">
                                        <div class="card mb-4" style="height: 350px;">
                                            <div class="card-body">
                                                <div class="mb-1 w-100 d-flex justify-content-between align-items-center">
                                                    <p class="text-muted"><?= $date->format('d M Y'); ?></p>
                                                    <p class="text-muted"><?= $date->format('H:i'); ?></p>
                                                </div>
                                                <h5 class="mt-3"><?= $row->agenda_nama; ?></h5>
                                                <p class="mt-1 text-secondary"><?= $row->agenda_deskripsi ?></p>
                                                <div class="d-flex flex-column justify-content-center mt-3">
                                                    <span class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                        <span class="ml-3 mb-1"><?= $row->agenda_tempat ?></span>
                                                    </span>
                                                    <span class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                        </svg>
                                                        </svg>
                                                        <span class="ml-3 mb-1"><?= $row->agenda_mulai ?> - <?= $row->agenda_selesai ?></span>
                                                    </span>
                                                    <span class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                                        </svg>
                                                        <span class="ml-3 mb-1"><?= $row->agenda_waktu ?></span>
                                                    </span>
                                                </div>
                                                <p class="mt-3 text-secondary"><?= $row->agenda_keterangan ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>
<!-- popular_program_area_end -->

<!-- teacher_area_start  -->
<div class="popular_program_area">
    <div class="container">
        <section class="my-6">
            <div class="mb-4 d-flex justify-content-between">
                <h1>Tenaga Pengajar</h1>
                <a class="btn btn-link text-primary d-flex align-items-center" href="<?php echo site_url('guru'); ?>">
                    <span class="mr-2">Lihat semua tenaga pengajar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg></a>
            </div>
            <div class="slick-carousel-teacher" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
                <?php
                foreach ($pengajar->result() as $row) :
                ?>
                    <div class="card mr-1 border-0 mr-4">
                        <?php if (empty($row->guru_photo)) : ?>
                            <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="card-img-top" alt="<?php echo $row->guru_nama; ?>">
                        <?php else : ?>
                            <img src="<?php echo UR_exists(base_url() . 'assets/images/' . $row->guru_photo) ? base_url() . 'assets/images/' . $row->guru_photo : base_url() . 'assets/images/Image_not_available.png'; ?>" alt="<?php echo $row->guru_nama; ?>" class="card-img-top img-fluid" style="border-radius: 18px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="mt-4"><?= $row->guru_nama; ?></h5>
                            <p class="mt-3 text-secondary"><?= $row->jabatan ?></p>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </section>
    </div>
</div>
<!--/ teacher_area_end -->