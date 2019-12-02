        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        </div>
        <!-- /.container-fluid -->

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
                      <th width="5%"><center>No.</center></th>
                      <th><center>Nama Turnamen</center></th>
                      <th><center>Nama Tim</center></th>
                      <th><center>Foto Struk</center></th>
                      <th width='14%'><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$r['namaTurnamen'] ?></td>        
                        <td><?=$r['namaTim'] ?></td>
                        <td><a class="MagicZoom" href="<?= base_url('android/images/struk/') . $r['fotoStruk']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('android/images/struk/') . $r['fotoStruk']; ?>" class="img-thumbnail" width="90" heigh="110"></td>
                        <td>
                            <center>
                                  <input type="hidden" class="form-control" name="is_active" value='2'><a href="<?= base_url('adminPUBG/acceptRegis/'.$r['idTurnamen']) ?>" class="badge badge-success">Accept</a> ||
                                    <a href="<?= base_url('adminPUBG/rejectPembayaran/'.$r['idTurnamen']) ?>" onclick="return confirm('Tolak permintaan ini?')" class="badge badge-danger">Reject</a>
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