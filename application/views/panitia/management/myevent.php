        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        </div>
        <!-- /.container-fluid -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
              <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
              </div>
              <a href="<?= site_url('management/formcreateEvent') ?>" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th><center>No.</center></th>
                      <th><center>Nama Turnamen</center></th>
                      <th><center>Nama Game</center></th>
                      <th><center>Deskripsi Turnamen</center></th>
                      <th><center>Slot</center></th>
                      <th><center>No HP</center></th>
                      <th width="10%"><center>Foto Turnamen</center></th>
                      <th><center>Foto Struk</center></th>
                      <th width="18%"><center>Upload</center></th>
                      <th width="10%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td>
                          <?=$r['namaTurnamen'] ?> <br>
                            <?php if ($r['is_active'] == 1) {?>
                             <small style="color:green">(Accepted)</small>
                            <?php }else if ($r['is_active'] == 2) { ?>
                              <small style="color:red">(Waiting)</small>
                            <?php }else if ($r['is_active'] == 3) { ?>
                              <small style="color:blue">(Finished)</small>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($r['idGame'] != 1) {?>
                            Mobile Legend
                            <?php }else { ?>
                            PUBG
                            <?php } ?>
                        </td>
                        <td><?=$r['deskTurnamen'] ?></td>
                        <td><center><?=$r['slotTerisi']  . "/" . $r['slotMax'] ?></center></td>
                        <td><?=$r['noHP'] ?></td>
                        <td>
                            <a class="MagicZoom" href="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" class="img-thumbnail" width="90" heigh="110">
                        </td>
                        <td><a class="MagicZoom" href="<?= base_url('assets/foto_struk_panitia/') . $r['fotoStruk']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('assets/foto_struk_panitia/') . $r['fotoStruk']; ?>" class="img-thumbnail" width="90" heigh="110"></td>
                        <td>
                          <center>
                              <a href="<?= base_url('management/formuploadfotoTurnamen/'.$r['idTurnamen']) ?>" class="badge badge-primary">Foto Turnamen</a> ||
                              <a href="<?= base_url('management/formuploadfotoStruk/'.$r['idTurnamen']) ?>" class="badge badge-primary"> Foto Struk</a>
                          </center>
                        </td>
                        <td>
                          <center>
                              <a href="<?= base_url('management/formeditEvent/'.$r['idTurnamen']) ?>" class="badge badge-info">Edit</a> ||
                              <a href="<?= base_url('management/deleteEvent/'.$r['idTurnamen']) ?>" onclick="return confirm('Yakin mau di hapus mz?')" class="badge badge-danger">Delete</a>
                          </center>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    </table>
              </div>
            </div>
          </div>
      <!-- End of Main Content -->

      </div>
      <!-- End of Main Content -->
