<div class="recent_event_area my-5">
    <div class="container">
        <h2 class="mb-5">Agenda</h2>


        <?php foreach ($data->result() as $row) :
            $date = new DateTime($row->agenda_tanggal);
            $date_agenda1 = new DateTime($row->agenda_mulai);
            $date_agenda2 = new DateTime($row->agenda_selesai); ?>
            <div class="col-md-12 border-bottom mb-4">
                <p class="mb-0 d-flex align-items-center">
                    <span class="border border-dark px-3 py-1" style="border-radius: 18px; font-family: 'Poppins', sans-serif;">
                        <?= $date->format('d M Y'); ?>
                    </span>
                    <span class="ml-2"> <i class="flaticon-clock"></i> <?= $date->format('H:i'); ?></span>
                </p>
                <h4 class="mt-4" style="font-family: 'Poppins', sans-serif;"><?= $row->agenda_nama; ?></h4>
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
                        <span class="ml-3 mb-1"><?= $date_agenda1->format('d M Y') ?> - <?= $date_agenda2->format('d M Y') ?></span>
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
        <?php endforeach; ?>
    </div>

    <nav class="mb-5"><?php echo $page; ?></nav>
    <!-- <div class="row justify-content-center">
            <div class="col-lg-10">

                <?php foreach ($data->result() as $row) : ?>
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span><?php echo date("d", strtotime($row->agenda_tanggal)); ?></span>
                            <p><?php echo date("M Y", strtotime($row->agenda_tanggal)); ?></p>
                        </div>
                        <div class="event_info px-5 py-3">
                            <h4><?php echo $row->agenda_nama; ?></h4>
                            <p><?php echo $row->agenda_deskripsi; ?></p>
                            <p><span> <i class="flaticon-clock"></i> <?php echo $row->agenda_waktu; ?></span> </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="col-md-12 text-center">
                <?php echo $page; ?>
            </div>
        </div>
    </div> -->
</div>