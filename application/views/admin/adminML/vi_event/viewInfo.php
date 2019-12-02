        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
            
        <?php
            $no = 1;
            foreach($datadetailEvent as $r)
              {  
                $id 			    = $r['idTurnamen'];
                $id_turnamen  = $r['idTurnamen'];
                $nama_tim     = $r['namaTim'];
            }?>
        </div>
        <!-- /.container-fluid -->
        <!-- /.container-fluid -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>No.</th>
                      <th>ID</th>
                      <th>Nama Tim</th>
                      <th>Action</th>
                    </tr>
                      <?php
                      $no = 1;
                      foreach($datadetailEvent as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?= $id_turnamen; ?></td>
                        <td><?= $nama_tim; ?></td>
                        <td>
                          <a href="<?= base_url('adminML/formeditTeam/'.$r['idTurnamen']) ?>">Edit</a> ||
                          <a href="<?= base_url('adminML/deleteTeam/'.$r['idTurnamen']) ?>" onclick="return confirm('Yakin mau di hapus mz?')">Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </thead>
                </table>
              </div>
            </div>
          </div>
      <!-- End of Main Content -->

      </div>
      <!-- End of Main Content -->  