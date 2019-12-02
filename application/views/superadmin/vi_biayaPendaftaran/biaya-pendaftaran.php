        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
          <div class="col-lg-5">

            <?= form_error('role','<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBiayaModal">Tambah Biaya</a>

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($biaya_pendaftaran as $r) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $r['biayaPendaftaran']; ?></td>
                    <td>
                        <a href="<?= base_url('superadmin/formeditbiayaPendaftaran/'.$r['idBiaya']) ?>" class="badge badge-info">Edit</a> ||
                        <a href="<?= base_url('superadmin/deleteBiaya/'.$r['idBiaya']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger">Delete</a>
                </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>

              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!--Modal-->

<!-- Tambah Biaya Modal -->
<div class="modal fade" id="tambahBiayaModal" tabindex="-1" role="dialog" aria-labelledby="tambahBiayaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Biaya Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('superadmin/biayaPendaftaran'); ?>" method="post">
          <div class="modal-body">
              <div class="form-group">
                  <input type="text" class="form-control" id="biayaPendaftaran"  name="biayaPendaftaran" placeholder="Biaya Pendaftaran">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- 
<!-- Edit Biaya Modal -->
<div class="modal fade" id="editBiayaModal" tabindex="-1" role="dialog" aria-labelledby="editBiayaModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Biaya Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('superadmin/editbiayaModal'); ?>" method="post">
          <div class="modal-body">
              <div class="form-group">
                  <input type="text" class="form-control" id="biayaPendaftaran" name="biayaPendaftaran" placeholder="Biaya Pendaftaran">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div> -->