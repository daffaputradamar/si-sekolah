<div class="recent_event_area my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-70">
                    <h3 class="mb-45">DAFTAR SISWA</h3>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">




                <div class="table-responsive">
                    <table class="table table-striped" id="display">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $i) :
                                $no++;
                                $id = $i['siswa_id'];
                                $nis = $i['siswa_nis'];
                                $nama = $i['siswa_nama'];
                                $jenkel = $i['siswa_jenkel'];
                                $kelas_id = $i['siswa_kelas_id'];
                                $kelas_nama = $i['kelas_nama'];

                            ?>
                                <tr>
                                    <td><?php echo $nis; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <?php if ($jenkel == 'L') : ?>
                                        <td>Laki-Laki</td>
                                    <?php else : ?>
                                        <td>Perempuan</td>
                                    <?php endif; ?>
                                    <td><?php echo $kelas_nama; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>





            </div>

        </div>
    </div>
</div>