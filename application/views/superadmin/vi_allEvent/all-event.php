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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>No.</th>
                      <th><center>Nama Turnamen</center></th>
                      <th><center>Nama Panitia</center></th>
                      <th><center>Slot Turnamen</center></th>
                      <th><center>No. HP</center></th>
                      <th><center>Status Turnamen</center></th>
                      <th width="10%"><center>Foto Turnamen</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$r['namaTurnamen'] ?></td>
                        <td><?=$r['namaPanitia'] ?></td>
                        <td><center><?=$r['slotTerisi']  . "/" . $r['slotMax'] ?></center></td>
                        <td><?=$r['noHP'] ?></td>
                        <td><?php if ($r['status_event'] == 1) {?>
                                <center><small style="color:black">(Masa Pendaftaran)</small></center>
                            <?php }else if ($r['status_event'] == 2) { ?>
                                <center><small style="color:blue">(Masa Pertandingan)</small></center>
                            <?php }else if ($r['status_event'] == 3) { ?>
                                <center><small style="color:green">(Turnamen Berakhir)</small></center>
                            <?php } ?>
                        </td>
                        <td><a class="MagicZoom" href="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" class="img-thumbnail" width="90" heigh="110"></td>
                        
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