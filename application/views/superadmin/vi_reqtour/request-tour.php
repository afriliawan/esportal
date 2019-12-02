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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th><center>No.</center></th>
                      <th><center>Nama Turnamen</center></th>
                      <th><center>Nama Game</center></th>
                      <th><center>Nama Panitia</center></th>
                      <th><center>Slot Max</center></th>
                      <th width="12%"><center>Foto Turnamen</center></th>
                      <th><center>Foto Struk</center></th>
                      <th  width="12%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><center><?=$no++ ?></center></td>
                        <td><center><?=$r['namaTurnamen'] ?></center></td>
                        <td>
                            <center>
                              <?php if ($r['idGame'] != 1) {?>
                              Mobile Legend
                              <?php }else { ?>
                              PUBG
                              <?php } ?>
                            </center>
                        </td>
                        <td><center><?=$r['namaPanitia'] ?></center></td>
                        <td><center><?=$r['slotMax'] ?></center></td>
                        <td>
                          <center>
                              <a class="MagicZoom" href="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" class="img-thumbnail" width="90" heigh="110">
                          </center>
                        </td>
                        
                        <td>
                          <center>
                              <a class="MagicZoom" href="<?= base_url('assets/foto_struk_panitia/') . $r['fotoStruk']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('assets/foto_struk_panitia/') . $r['fotoStruk']; ?>" class="img-thumbnail" width="90" heigh="110">
                          </center>
                        </td>
                        <td>
                          <center>
                              <input type="hidden" class="form-control" name="is_active" value='1'><a href="<?= base_url('superadmin/acceptreqTour/'.$r['idTurnamen']) ?>" class="badge badge-success" onclick="return confirm('Accept tournament request?')">Accept</a> ||
                                <a href="<?= base_url('superadmin/deletereqTour/'.$r['idTurnamen']) ?>" class="badge badge-danger" onclick="return confirm('Reject tournament request?')">Reject</a>
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
 