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

                <div class="box-header">
                    <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Data Guru / Staff</a>
                </div><br>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $i) :
                                $no++;
                                $id = $i['guru_id'];
                                $nip = $i['guru_nip'];
                                $nama = $i['guru_nama'];
                                $photo = $i['guru_photo'];
                                $jabatan = $i['jabatan'];

                            ?>
                                <tr>
                                    <?php if (empty($photo)) : ?>
                                        <td class="text-center"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>" width="200"></td>
                                    <?php else : ?>
                                        <td class="text-center"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $photo; ?>" width="200"></td>
                                    <?php endif; ?>
                                    <td><?php echo empty($nip) ? '-' : $nip; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $jabatan; ?></td>
                                    <td style="text-align:right;">


                                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Staff / Guru</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/simpan_guru' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Jabatan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xjabatan" class="form-control" id="inputUserName" placeholder="Contoh: Guru, Staff" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="filefoto" />
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php foreach ($data->result_array() as $i) :
        $id = $i['guru_id'];
        $nip = $i['guru_nip'];
        $nama = $i['guru_nama'];
        $jabatan = $i['jabatan'];
        $photo = $i['guru_photo'];
    ?>

        <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Guru</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/update_guru' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                            <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnip" value="<?php echo $nip; ?>" class="form-control" id="inputUserName" placeholder="NIP">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="inputUserName" placeholder="Nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jabatan</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xjabatan" value="<?php echo $jabatan; ?>" class="form-control" id="inputUserName" placeholder="Contoh: PPKN, Matematika" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="filefoto" />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?php foreach ($data->result_array() as $i) :
        $id = $i['guru_id'];
        $nip = $i['guru_nip'];
        $nama = $i['guru_nama'];
        $jabatan = $i['jabatan'];
        $photo = $i['guru_photo'];
    ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Guru</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/hapus_guru' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                            <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus guru <b><?php echo $nama; ?></b> ?</p>

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


    <?php if ($this->session->flashdata('msg') == 'error') : ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Error',
                text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#FF4859'
            });
        </script>

    <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Guru Berhasil disimpan ke database.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Info',
                text: "Guru berhasil di update",
                showHideTransition: 'slide',
                icon: 'info',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#00C9E6'
            });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Guru Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
        </script>
    <?php else : ?>

    <?php endif; ?>