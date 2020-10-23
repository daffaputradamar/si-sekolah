<div id="content">


    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>




    </nav>

    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tamu</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $i) :
                                $no++;
                                $tamu_id = $i['id_tamu'];
                                $tamu_nama = $i['nama_tamu'];
                                $tamu_pesan = $i['pesan_tamu'];
                                $tanggal = $i['tanggal'];
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $tamu_nama; ?></td>
                                    <td><?php echo $tamu_pesan; ?></td>
                                    <td><?php echo $tanggal; ?></td>

                                    <td style="text-align:right;">

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $tamu_id; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>


                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>

    </div>


    <?php foreach ($data->result_array() as $i) :
        $tamu_id = $i['id_tamu'];
        $tamu_nama = $i['nama_tamu'];
    ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $tamu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pesan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/bukutamu/hapus_pesan' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $tamu_id; ?>" />
                            <p>Apakah Anda yakin mau menghapus Pesan dari <b><?php echo $tamu_nama; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>