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
          <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Data Siswa</a>
        </div><br>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th style="text-align:right;">Aksi</th>
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
                $photo = $i['siswa_photo'];

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
          <h4 class="modal-title" id="myModalLabel">Add Siswa</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/simpan_siswa' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
              <div class="col-sm-7">
                <input type="text" name="xnis" class="form-control" id="inputUserName" placeholder="NIS" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-7">
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                  <label for="inlineRadio1"> Laki-Laki </label>
                </div>
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                  <label for="inlineRadio2"> Perempuan </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
              <div class="col-sm-7">
                <select name="xkelas" class="form-control" required>
                  <option value="">-Pilih-</option>
                  <?php
                  foreach ($kelas->result_array() as $k) {
                    $id_kelas = $k['kelas_id'];
                    $nm_kelas = $k['kelas_nama'];

                  ?>
                    <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                  <?php } ?>
                </select>
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

  <!--Modal Edit Album-->
  <?php foreach ($data->result_array() as $i) :
    $id = $i['siswa_id'];
    $nis = $i['siswa_nis'];
    $nama = $i['siswa_nama'];
    $jenkel = $i['siswa_jenkel'];
    $kelas_id = $i['siswa_kelas_id'];
    $photo = $i['siswa_photo'];
  ?>

    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Guru</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/update_siswa' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id; ?>" />
              <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-7">
                  <input type="text" name="xnis" value="<?php echo $nis; ?>" class="form-control" id="inputUserName" placeholder="NIP" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="inputUserName" placeholder="Nama" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-7">
                  <?php if ($jenkel == 'L') : ?>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                      <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                      <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  <?php else : ?>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                      <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                      <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
                <div class="col-sm-7">
                  <select name="xkelas" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <?php
                    foreach ($kelas->result_array() as $k) {
                      $id_kelas = $k['kelas_id'];
                      $nm_kelas = $k['kelas_nama'];

                    ?>
                      <?php if ($id_kelas == $kelas_id) : ?>
                        <option value="<?php echo $id_kelas; ?>" selected><?php echo $nm_kelas; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                      <?php endif; ?>
                    <?php } ?>
                  </select>
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
    $id = $i['siswa_id'];
    $nis = $i['siswa_nis'];
    $nama = $i['siswa_nama'];
    $jenkel = $i['siswa_jenkel'];
    $kelas_id = $i['siswa_kelas_id'];
    $photo = $i['siswa_photo'];
  ?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Siswa</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/hapus_siswa' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id; ?>" />
              <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
              <p>Apakah Anda yakin mau menghapus Siswa <b><?php echo $nama; ?></b> ?</p>

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