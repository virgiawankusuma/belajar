  <div class="content-wrapper">
      <section class="content container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <?php if ($this->session->flashdata('info')) { ?>
                      <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                          <?= $this->session->flashdata('info'); ?>
                      </div>
                  <?php } ?>
                  <div class="box">
                      <div class="box-header width-border">
                          <h3 class="box-title">
                              Daftar Barang Masuk
                          </h3>
                      </div>
                      <div class="box-body">
                          <table class="table table-bordered">
                              <thead>
                                  <th>No</th>
                                  <th>Nama Barang</th>
                                  <th>Kategori</th>
                                  <th>Stok</th>
                                  <th>Harga</th>
                                  <th>Aksi</th>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                    foreach ($barang as $brg) { ?>
                                      <tr>
                                          <td><?php echo $no++ ?></td>
                                          <td><?php echo $brg->nama_barang ?></td>
                                          <td><?php echo $brg->kategori ?></td>
                                          <td><?php echo $brg->stok ?></td>
                                          <td><?php echo $brg->harga ?></td>
                                          <td>
                                              <button class="btn btn-warning" data-toggle="modal" data-target="#modaledit<?= $brg->idbarang; ?>"><i class="fa fa-pencil"></i></button>
                                              <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                          </td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"> Tambah Barang</i></i></button>
              </div>
          </div>
      </section>
  </div>

  <div class="modal fade" id="modaltambah">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Barang</h4>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('dashboard/tambah'); ?>" method="post">
                      <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang " required>
                      </div>
                      <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori" required>
                      </div>
                      <div class="form-group">
                          <label for="stok">Stok</label>
                          <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok " required>
                      </div>
                      <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga " required>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <?php foreach ($barang as $brg) { ?>
      <div class="modal fade" id="modaledit<?= $brg->idbarang; ?>">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Barang</h4>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post">
                          <div class="form-group">
                              <label for="nama_barang">Nama Barang</label>
                              <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang " value="<?= $brg->nama_barang; ?>" required>
                          </div>
                          <div class="form-group">
                              <label for="kategori">Kategori</label>
                              <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori" value="<?= $brg->kategori; ?>" required>
                          </div>
                          <div class="form-group">
                              <label for="stok">Stok</label>
                              <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok " value="<?= $brg->stok; ?>" required>
                          </div>
                          <div class="form-group">
                              <label for="harga">Harga</label>
                              <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga " value="<?= $brg->harga; ?>" required>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
  <?php } ?>