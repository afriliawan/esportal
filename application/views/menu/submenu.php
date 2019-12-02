        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
          <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col"><center>#</center></th>
                    <th scope="col"><center>Menu</center></th>
                    <th scope="col"><center>Title</center></th>
                    <th scope="col"><center>Url</center></th>
                    <th scope="col"><center>Icon</center></th>
                    <th scope="col"><center>Active</center></th>
                    <!-- <th scope="col">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($subMenu as $sm) : ?>
                  <tr>
                    <th scope="row"><center><?= $i; ?></center></th>
                    <td><?= $sm['title']; ?></td>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['icon']; ?></td>
                    <td>
                      <center>
                            <?php if ($sm['is_active'] != 1) {?>
                            No
                            <?php }else { ?>
                            Yes
                            <?php } ?>
                      </center>
                    </td>
                    <!-- <td <td>
                    <a href="" class="badge badge-success">Edit</a>
                    <a href="" class="badge badge-danger">Delete</a>
                    </td> -->
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

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubModalLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
          <div class="modal-body">
              <div class="form-group">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
              </div>
              <div class="form-group">
                  <select name="menu_id" id="menu_id" class="form-control">
                      <option value="">Select Menu</option>
                      <?php foreach ($menu as $m) : ?>
                      <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
              </div>
              <div class="form-group">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                      <label class="form-check-label" for="is_active">
                        Active?
                      </label>
                  </div>
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