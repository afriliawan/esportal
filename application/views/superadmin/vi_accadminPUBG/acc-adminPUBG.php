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
              <a href="<?= site_url('superadmin/createAdminPUBG') ?>" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>No. HP</th>
                      <th>Active</th>
                      <th width='15%'>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$r['name'] ?></td>
                        <td><?=$r['email'] ?></td>
                        <td><?=$r['alamat'] ?></td>
                        <td><?=$r['nohp'] ?></td>
                        <td>
                            <?php if ($r['is_active'] != 1) {?>
                            No
                            <?php }else { ?>
                            Yes
                            <?php } ?>
                        </td>
                        <td><center>
                        <a href="<?= base_url('superadmin/activeadminPUBG/'.$r['id']) ?>" onclick="return confirm('Activated this account?')" class="badge badge-success">Active</a>
                        <a href="<?= base_url('superadmin/deleteadminPUBG/'.$r['id']) ?>" onclick="return confirm('Delete this account?')" class="badge badge-danger">Delete</a>
                        <a href="<?= base_url('superadmin/deactiveadminPUBG/'.$r['id']) ?>" onclick="return confirm('Deactive this account?')" class="badge badge-dark">Deactive</a>
                        </center></td>
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