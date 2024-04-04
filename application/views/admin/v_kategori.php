<?php
  $color_map = array(
    'primary' => 'Biru',
    'secondary' => 'Abu - Abu',
    'success' => 'Hijau',
    'danger' => 'Merah',
    'warning' => 'Kuning',
    'info' => 'Biru Muda',
    'dark' => 'Hitam'
  );
?>

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
          <a href="#" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Kategori</a>
        </div>

        <br>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width:100px;">#</th>
                <th>Kategori</th>
                <th>Warna</th>
                <th style="text-align:right;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $i) :
                $no++;
                $kategori_id = $i['kategori_id'];
                $kategori_nama = $i['kategori_nama'];
                $kategori_warna = $i['color_type'];

              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kategori_nama; ?></td>
                  <td class="text-<?= $kategori_warna ?>"><?php echo $color_map[$kategori_warna]; ?></td>

                  <td style="text-align:right;">
                    <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $kategori_id; ?>">
                      <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $kategori_id; ?>">
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
          <h4 class="modal-title" id="myModalLabel">Add Kategori</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/kategori/simpan_kategori' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
              <div class="col-sm-7">
                <input type="text" name="xkategori" class="form-control" id="inputUserName" placeholder="Kategori" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputColorType" class="col-sm-4 control-label">Warna</label>
              <div class="col-sm-7">
                <select name="xcolor" id="inputColorType" class="form-control" required>
                  <option value="primary">Biru</option>
                  <option value="secondary">Abu - Abu</option>
                  <option value="success">Hijau</option>
                  <option value="danger">Merah</option>
                  <option value="warning">Kuning</option>
                  <option value="info">Biru Muda</option>
                  <option value="dark">Hitam</option>
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


  <?php foreach ($data->result_array() as $i) :
    $kategori_id = $i['kategori_id'];
    $kategori_nama = $i['kategori_nama'];
    $kategori_warna = $i['color_type'];

  ?>
    <!--Modal Edit Pengguna-->
    <div class="modal fade" id="ModalEdit<?php echo $kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/kategori/update_kategori' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
                <div class="col-sm-7">
                  <input type="hidden" name="kode" value="<?php echo $kategori_id; ?>" />
                  <input type="text" name="xkategori" class="form-control" id="inputUserName" value="<?php echo $kategori_nama; ?>" placeholder="Kategori" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputColorType" class="col-sm-4 control-label">Warna</label>
                <div class="col-sm-7">
                  <select name="xcolor" id="inputColorType" class="form-control" required>
                    <option value="primary" <?=($kategori_warna == "primary") ? 'selected' : '';?>>Biru</option>
                    <option value="secondary" <?=($kategori_warna == "secondary") ? 'selected' : '';?>>Abu - Abu</option>
                    <option value="success" <?=($kategori_warna == "success") ? 'selected' : '';?>>Hijau</option>
                    <option value="danger" <?=($kategori_warna == "danger") ? 'selected' : '';?>>Merah</option>
                    <option value="warning" <?=($kategori_warna == "warning") ? 'selected' : '';?>>Kuning</option>
                    <option value="info" <?=($kategori_warna == "info") ? 'selected' : '';?>>Biru Muda</option>
                    <option value="dark" <?=($kategori_warna == "dark") ? 'selected' : '';?>>Hitam</option>
                  </select>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($data->result_array() as $i) :
    $kategori_id = $i['kategori_id'];
    $kategori_nama = $i['kategori_nama'];
  ?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/kategori/hapus_kategori' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $kategori_id; ?>" />
              <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $kategori_nama; ?></b> ?</p>

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