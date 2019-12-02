        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
        <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
              </div>
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
                      <th width="5%"><center>No.</center></th>
                      <th><center>Nama Gathering</center></th>
                      <th><center>Tempat</center></th>
                      <th><center>Biaya</center></th>
                      <th><center>Foto Gathering</center></th>
                      <th><center>Tanggal Gathering</center></th>
                      <th><center>Tanggal Posting</center></th>
                      <th><center>Action</center></th>
                    </tr>
                   </thead>
                   <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$r['namaGath'] ?></td>
                        <td><?=$r['tempatGath'] ?></td>        
                        <td><?=$r['biaya'] ?></td>  
                        <td><center><a class="MagicZoom" href="<?= base_url('/android/images/gathering/') . $r['fotoGath']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('/android/images/gathering/') . $r['fotoGath']; ?>" class="img-thumbnail" width="90" heigh="110"></center></td>      
                        <td><?= date("d F Y", strtotime($r['tglGath'])); ?></td>
                        <td><?= date("d F Y", strtotime($r['tglPosting'])); ?></td>
                        <td><center><a href="<?= base_url('superadmin/deleteGathering/'.$r['id']) ?>" onclick="return confirm('Delete this account?')" class="badge badge-danger">Delete</a></center></td>
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