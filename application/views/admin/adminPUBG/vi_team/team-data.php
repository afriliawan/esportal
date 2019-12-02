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
                      <th>No.</th>
                      <th>Nama Turnamen</th>
                      <th>Nama Tim</th>
                      <th>Username Ketua</th>
                      <th>No HP Ketua</th>
                      <th>Nickname Ketua</th>
                      <th>Nickname Anggota 1</th>
                      <th>Nickname Anggota 2</th>
                      <th>Nickname Anggota 3</th>
                      <th>Nickname Anggota 4</th>
                      <th>Action</th>
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
                        <td><?=$r['usrKetua'] ?></td>        
                        <td><?=$r['noKetua'] ?></td>
                        <td><?=$r['ignKetua'] ?></td>
                        <td><?=$r['ignAng1'] ?></td>
                        <td><?=$r['ignAng2'] ?></td>
                        <td><?=$r['ignAng3'] ?></td>
                        <td><?=$r['ignAng4'] ?></td>
                        <td><center>
                          <a href="<?= base_url('adminPUBG/formeditTeam/'.$r['idRegis']) ?>" class="badge badge-info">Edit</a> ||
                          <a href="<?= base_url('adminPUBG/deleteTeam/'.$r['idRegis']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger tombol-hapus" >Delete</a>
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
      <!-- <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/myscript.js"></script> -->