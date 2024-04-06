<div class="recent_event_area my-5">
    <div class="container">
        <h2 class="mb-5">Pengumuman</h2>
        <div class="row">
        <?php foreach ($data->result() as $row) : ?>
            <div class="col-md-12 border-bottom mb-4">
                <p class="mb-0 d-flex align-items-center">
                    <span class="border border-dark px-3 py-1" style="border-radius: 18px; font-family: 'Poppins', sans-serif;">
                        <?= date("d M Y", strtotime($row->pengumuman_tanggal)); ?>
                    </span>
                    <span class="ml-2"> <i class="flaticon-clock"></i> <?php echo date("H:i", strtotime($row->pengumuman_tanggal)) . ' WIB'; ?></span> 
                </p>
                <h4 class="mt-4" style="font-family: 'Poppins', sans-serif;"><?= $row->pengumuman_judul; ?></h4>
                <p class="mb-1"><?= $row->pengumuman_deskripsi; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        
        <nav class="mb-5"><?php echo $page; ?></nav>
    </div>
</div>