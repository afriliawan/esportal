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
              <a href="<?= site_url('adminML/formcreateEvent') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
                  <th>Jenis Turnamen</th>
                  <th>Nama Panitia</th>
                  <th>Slot Turnamen</th>
                  <th width="10%">Foto Turnamen</th>
                  <th width="10%">Upload</th>
                  <th width="10%">Action</th>
                  <th width="10%">Status Turnamen</th>
                </tr>
              </tr>
              </thead>
              <tbody>
                  <?php
                  $no = 1;
                  foreach($hasil as $r){ ?>
                  <tr>
                    <td><?=$no++ ?></td>
                    <td><?=$r['namaTurnamen'] ?></td>
                    <td><?=$r['jenisTurnamen'] ?></td>
                    <td><?=$r['namaPanitia'] ?></td>
                    <td><center><?=$r['slotTerisi']  . "/" . $r['slotMax'] ?></center></td>
                        <td>
                            <a class="MagicZoom" href="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="<?= base_url('/android/images/turnamen/') . $r['fotoTurnamen']; ?>" class="img-thumbnail" width="90" heigh="110">
                        </td>
                        <td>
                            <center>
                                <a href="<?= base_url('adminML/formuploadfotoTurnamen/'.$r['idTurnamen']) ?>" class="badge badge-primary">Foto Turnamen</a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="<?= base_url('adminML/formeditEvent/'.$r['idTurnamen']) ?>" class="badge badge-info">Edit</a> ||
                                <a href="<?= base_url('adminML/deleteEvent/'.$r['idTurnamen']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger">Delete</a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <!-- <a href="<?= base_url('adminML/registerTurnamen/'.$r['idTurnamen']) ?>" class="badge badge-dark">Registration</a> -->
                                <a href="<?= base_url('adminML/battleTurnamen/'.$r['idTurnamen']) ?>" class="badge badge-primary">Battle</a> ||
                                <a href="<?= base_url('adminML/finishTurnamen/'.$r['idTurnamen']) ?>" class="badge badge-success">Finish</a>
                            </center>
                            <?php if ($r['status_event'] == 1) {?>
                                <center><small style="color:black">(Masa Pendaftaran)</small></center>
                            <?php }else if ($r['status_event'] == 2) { ?>
                                <center><small style="color:blue">(Masa Pertandingan)</small></center>
                            <?php }else if ($r['status_event'] == 3) { ?>
                                <center><small style="color:green">(Turnamen Berakhir)</small></center>
                            <?php } ?>
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