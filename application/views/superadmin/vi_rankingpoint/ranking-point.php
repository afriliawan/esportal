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
                <table class="table table-bordered" id="dataTable" width="60%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width='5%'>No.</center></th>
                      <th><center>Username</center></th>
                      <th><center>Nickname</center></th>
                      <th><center>Point</center></th>
                      <th><center>Rewards</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><center><?=$no++ ?></center></td>
                        <td><?=$r['username'] ?></td>
                        <td><?=$r['name'] ?></td>
                        <td><center><?=$r['userPoint'] ?></center></td>
                        <td>
                          <center>
                            <a href="<?= base_url('superadmin/limaribuPoint/'.$r['id']) ?>" class="badge badge-success">+5000</a> ||
                            <a href="<?= base_url('superadmin/tigaribuPoint/'.$r['id']) ?>" class="badge badge-success">+3000</a> ||
                            <a href="<?= base_url('superadmin/duaribuPoint/'.$r['id']) ?>" class="badge badge-success">+2000</a>
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